<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends MY_Controller
{

	public function index()
	{
		$yearToHour = 8760;
		$reffList = $this->getDataRow('percentage_refferal', '*', '', '', '', 'pkey asc');
		$table = 'detail_account_farming';
		$select = $table . '.*,
		farming.name farming_name,
		farming.percentage percentage,
		farming.price price,
		';
		$join = array(
			array('farming', 'farming.pkey=' . $table . '.farmingkey', 'left'),
		);
		//update yg sudah sampai 
		$this->update($table, array('status' => 1), array('hour >=' => $yearToHour, 'status' => 0));

		$data = $this->getDataRow($table, $select, array('status' => 0), '', $join);
		// print_r($data);
		foreach ($data as $key => $value) {
			$price = $value['price'];
			$onePrcent = $price / 100;
			$valuePrcent = $onePrcent * $value['percentage'];
			$fixVal = $valuePrcent / $yearToHour;

			//tambahkan saldo account user
			$this->set('account', array('pkey' => $value['refkey']), ['crypto', 'crypto + ' . $fixVal, false]);

			//tambahkan profit ke detail Farming 
			$this->set('detail_account_farming', array('pkey' => $value['pkey']), ['profit', 'profit + ' . $fixVal, false]);
			$this->set('detail_account_farming', array('pkey' => $value['pkey']), ['hour', 'hour + 1', false]);

			//tambahkan ke history
			$dataHistory = array(
				'refkey' => $value['refkey'],
				'targetkey' => $value['refkey'],
				'value' => '+ ' . $fixVal,
				'note' => $value['farming_name'],
				'time' => strtotime('now'),
			);
			$this->insert('logs_farming', $dataHistory);
			$refkey = $value['refkey'];
			foreach ($reffList as $reffListKey => $reffListValue) {
				$chekReff = $this->getDataRow('account', 'refkey', array('pkey' => $refkey));
				if (count($chekReff) == 0)
					break;
				$refkey = $chekReff[0]['refkey'];
				$reffFee = ($fixVal / 100) * $reffListValue['percentage'];
				$this->set('account', array('pkey' => $refkey), array('crypto', 'crypto + ' . $reffFee, false));
				$reffLog = array(
					'refkey' => $refkey,
					'targetkey' => $value['refkey'],
					'value' => '+ ' . $reffFee,
					'note' => 'refferal',
					'time' => strtotime('now'),
				);
				$this->insert('logs_farming', $reffLog);
			}
		}
		echo 'done';
	}
}
