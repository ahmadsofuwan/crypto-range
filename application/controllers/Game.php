<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Game extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->login) {
			redirect(base_url('Auth'));
		}
		if ($this->role !== '2') {
			redirect(base_url('Auth'));
		}
		$this->limitRange = 10;
		$this->limitLevel = 9;
		$this->reffFee = [30, 2, 2, 2, 2, 2, 2, 3, 4];
		$this->npoolFee = [4, 8, 13];
		$this->ClaimFee = [40, 15, 10, 5, 5, 5, 5, 5, 5, 5]; //fee npool claim
	}

	public function index()
	{

		$account = $this->getDataRow('account', '*', array('pkey' => $this->id))[0];

		if ($account['status'] == 0) {

			$commpany = $this->getDataRow('profile_company')[0];
			if ($account['crypto'] >= $commpany['feeactive']) {
				$this->set('account', array('pkey' => $this->id), array('crypto', 'crypto - ' . $commpany['feeactive'], false));
				$this->update('account', array('status' => 1), array('pkey' => $this->id));
				$this->session->set_flashdata('active', true);
				$this->session->set_flashdata('msg', 'your account has been done burn ' . $commpany['feeactive'] . ' Matic');
				$this->referalFee($commpany['feeactive']); //pembagian ke reff
			} else {
				$reff = $this->getDataRow('account', 'phone', array('pkey' => $account['refkey']))[0];
				$this->session->set_flashdata('nonActive', true);
				$this->session->set_flashdata('msg', 'your account is not active, Burn ' . $commpany['feeactive'] . ' Matic for Activate!');
				$this->session->set_flashdata('reff', '<a href="https://wa.me/' . $reff['phone'] . '" target="_blank">WhastApp Upline</a>');
			}
		}

		$data = $this->getDataRow('account', '*', array('pkey' => $this->id))[0];

		$data['html']['reffFee'] = $this->reffFee;
		$data['html']['reff'] = $this->follower($this->id);
		$data['html']['data'] = $data;
		$data['html']['nav'] = 'home';
		$data['url'] = 'public/body';
		$this->templatePublic($data);
	}
	public function range()
	{
		$joint = array(
			array('account', 'account.pkey=range.refkey', 'left')
		);

		$select = 'range.*,
		account.username as username,
		account.pkey as userkey,
		';

		$rangeOne = $this->getDataRow('range', $select, array('date <=' => strtotime('-1 month')), '10', $joint, 'range.count desc');
		$rangeTwo = $this->getDataRow('range', $select, array('date <=' => strtotime('-2 month')), '10', $joint, 'range.count desc');
		$rangeThree = $this->getDataRow('range', $select, array('date <=' => strtotime('-3 month'),), '10', $joint, 'range.count desc');

		$feeOne = $this->getDataRow('month_fee', 'fee', array('range' => 1))[0]['fee'];
		$feeTwo = $this->getDataRow('month_fee', 'fee', array('range' => 2))[0]['fee'];
		$feeThree = $this->getDataRow('month_fee', 'fee', array('range' => 3))[0]['fee'];


		$data['html']['feeOne'] = $feeOne;
		$data['html']['feeTwo'] = $feeTwo;
		$data['html']['feeThree'] = $feeThree;

		$data['html']['rangeThree'] = $rangeThree;
		$data['html']['rangeTwo'] = $rangeTwo;
		$data['html']['rangeOne'] = $rangeOne;
		$data['html']['npoolFee'] = $this->npoolFee;
		$data['html']['claimFee'] = $this->ClaimFee;
		$data['html']['nav'] = 'range';
		$data['html']['data'] = $data;
		$data['url'] = 'public/range';
		$this->templatePublic($data);
	}

	public function gpool()
	{
		$limit = $this->getDataRow('global_list', 'count(refkey) as limited,global_list.globalkey', array('refkey' => $this->id), '', '', '', '', array('globalkey'));
		$commpany = $this->getDataRow('profile_company')[0];

		$item = $this->getDataRow('global_fee');
		$data['html']['commpany'] = $commpany;
		$data['html']['limit'] = $limit;
		$data['html']['nav'] = 'gpool';
		$data['html']['item'] = $item;
		$data['url'] = 'public/gpools';
		$this->templatePublic($data);
	}

	public function crypto()
	{
		$account = $this->getDataRow('account', '*', array('pkey' => $this->id));
		$upline = $this->getDataRow('account', '*', array('pkey' => $account[0]['refkey']))[0];
		$commpany = $this->getDataRow('profile_company', '*')[0];
		$logSel = 'logs.*,
		account.username as username
		';
		$logsJoint = array(
			array('account', 'account.pkey=logs.targetkey', 'left')
		);
		$logs = $this->getDataRow('logs', $logSel, array('logs.refkey' => $this->id), '', $logsJoint, 'logs.time desc');

		$data['html']['upline'] = $upline;
		$data['html']['logs'] = $logs;
		$data['html']['commpany'] = $commpany;
		$data['html']['account'] = $account;
		$data['url'] = 'public/crypto';
		$this->templatePublic($data);
	}

	private function referalFee($fee)
	{

		//3bulan = 25%
		//2bulan = 15
		//1bulan = 10

		//pembagain rengking 4-10 = 5% ;1= 40%;2=15%;3=10%
		$compaleteRef = 6;
		$reffFee = $this->reffFee;
		$pkey = $this->id;
		$percentFee = $fee / 100;
		foreach ($reffFee as $value) {
			if (empty($pkey))
				break;
			$percentage = $percentFee * $value;
			$referal = $this->getDataRow('account', 'refkey', array('pkey' => $pkey))[0]['refkey'];
			$chekTotalReff = $this->getDataRow('account', 'pkey', array('refkey' => $referal));
			if (count($chekTotalReff) >= $compaleteRef) { //jika refnya mencukupi standar maka dapat fee
				$this->set('account', array('pkey' => $referal), array('crypto', 'crypto +' . $percentage, false));
				$this->insert('logs', array('refkey' => $referal, 'targetkey' => $this->id, 'time' => strtotime('now'), 'note' => 'Burn Reff', 'value' => '+' . $percentage));
			}
			$pkey = $referal;
		}

		//pembagian 50% ke range n-pool
		$feeRange = $this->npoolFee;
		foreach ($feeRange as $key => $value) {
			$feeToRange = $percentFee * $value;
			$this->set('month_fee', array('range' => $key + 1), array('fee', 'fee +' . $feeToRange, false));
		}

		$globalRange = [4, 8, 13]; //g-pool
		foreach ($globalRange as $key => $value) {
			$feeToRange = $percentFee * $value;
			$this->set('global_fee', array('percentage' => $value), array('fee', 'fee +' . $feeToRange, false));
		}
	}

	private function follower($pkeys)
	{
		$companny = $this->getDataRow('profile_company', 'twig', array('id' => 1))[0];
		$pkey = [$pkeys];
		$result = array();
		$twig = $companny['twig'];
		$level = 1;
		while ($twig > 0) {
			if (count($pkey) == 0)
				break;
			$dataRef = $this->getDataRow('account', 'refkey,pkey,username', '', '', '', '', array('refkey', $pkey));

			$pkey = [];
			foreach ($dataRef as $item => $value) {
				// $value['level'] = $level;
				// array_push($result, $value);
				array_push($pkey, $value['pkey']);
			}
			$newArr = array(
				'level' => $level,
				'count' => count($dataRef),
			);

			array_push($result, $newArr);
			$level++;

			$twig--;
		}
		return $result;
	}

	public function ajax()
	{
		switch ($this->input->post('action')) {
			case 'buy':
				$chekcrypto = $this->getDataRow('account', 'crypto', array('pkey' => $this->id))[0];
				$chekFarming = $this->getDataRow('farming', '*', array('pkey' => $this->input->post('data')))[0];
				$status = 'not enough';
				$updatecrypto = '';
				if (floatval($chekcrypto['crypto']) > floatval($chekFarming['price'])) {
					$status = 'success';
					$updatecrypto = floatval($chekcrypto['crypto']) - floatval($chekFarming['price']);
					$this->update('account', array('crypto' => $updatecrypto), array('pkey' => $this->id));
					$this->insert('detail_account_farming', array('refkey' => $this->id, 'farmingkey' => $this->input->post('data'), 'time' => strtotime('now')));
				}
				echo json_encode(array('status' => $status, 'crypto' => number_format(round($updatecrypto, 2))));
				break;
			case 'sendCrypto':
				$cehkUsername = $this->getDataRow('account', 'pkey', array('username' => $this->input->post('username')));
				if (count($cehkUsername) == 0) {
					echo json_encode(array('status' => 'Username Not found'));
					die;
				}
				$cehkMinimum = $this->getDataRow('profile_company', '*', '', '1')[0];
				if ($cehkMinimum['minimumsend'] > $this->input->post('crypto')) {
					echo json_encode(array('status' => 'Minimum Transfer ' . $cehkMinimum['minimumsend']));
					die;
				}
				$chekAccount = $this->getDataRow('account', '*', array('pkey' => $this->id))[0];
				$totalKeluar = $this->input->post('crypto') + $cehkMinimum['cryptotransactionfee'];
				if ($chekAccount['crypto'] < $totalKeluar) {
					echo json_encode(array('status' => 'Matic is not enough ' . $chekAccount['crypto']));
					die;
				}
				$this->set('account', array('pkey' => $this->id), array('crypto', 'crypto -' . $totalKeluar, false));
				$this->set('account', array('pkey' => $cehkUsername[0]['pkey']), array('crypto', 'crypto +' . $this->input->post('crypto'), false));

				$this->insert('logs', array('targetkey' => $cehkUsername[0]['pkey'], 'refkey' => $this->id, 'note' => 'Fee Transfer', 'value' => '-' . $cehkMinimum['cryptotransactionfee'], 'time' => strtotime('now')));
				$this->insert('logs', array('targetkey' => $cehkUsername[0]['pkey'], 'refkey' => $this->id, 'note' => 'Transfer', 'value' => '-' . $this->input->post('crypto'), 'time' => strtotime('now')));
				$this->insert('logs', array('targetkey' => $this->id, 'refkey' =>  $cehkUsername[0]['pkey'], 'note' => 'Transfer', 'value' => '+' . $this->input->post('crypto'), 'time' => strtotime('now')));

				echo json_encode(array('status' => 'success'));
				break;
			case 'cryptoClaim';
				break;

			case 'widraw':
				$companny = $this->getDataRow('profile_company', '*')[0];
				if ($companny['minimumwidraw'] > $this->input->post('widraw')) {
					echo json_encode(array('status' => 'Minimum Widraw ' . $companny['minimumwidraw'] . ' Matic'));
					die;
				}
				$account = $this->getDataRow('account', '*', array('pkey' => $this->id))[0];
				if ($account['crypto'] < $this->input->post('widraw')) {
					echo json_encode(array('status' => 'Matic is not enough'));
					die;
				} else {
					$this->set('account', array('pkey' => $this->id), array('crypto', 'crypto -' . $this->input->post('widraw'), false));
					$dataInsert = array('refkey' => $this->id, 'walletaddress' => $this->input->post('wallet'), 'time' => strtotime('now'), 'crypto' => $this->input->post('widraw'));
					$this->insert('widraw', $dataInsert);
					$this->insert('logs', array(
						'targetkey' => $this->id,
						'refkey' => $this->id,
						'time' => strtotime('now'),
						'note' => 'Withdraw',
						'value' => '- ' . $this->input->post('widraw'),
					));

					echo json_encode(array('status' => 'success'));
				}
				break;
			case 'claim':
				//pembagain rengking 4-10 = 5% ;1= 40%;2=15%;3=10%
				$percentageFee = $this->ClaimFee;

				$range = $this->getDataRow('range', '*', array('date <=' => strtotime('-' . $this->input->post('target') . ' month')), $this->limitRange, '', 'range.count desc');
				$monthFee = $this->getDataRow('month_fee', 'fee', array('range' => $this->input->post('target')))[0]['fee'];
				if ($range[0]['refkey'] == $this->id) {
					foreach ($range as $key => $value) {
						$fee = $monthFee / 100;
						$fee = $fee * $percentageFee[$key];
						$this->set('account', array('pkey' => $value['refkey']), array('crypto', 'crypto +' . $fee, false));
						$this->update('range', array('count' => 0, 'date' => strtotime('now')), array('refkey' => $value['refkey']));
					}
					$this->update('month_fee', array('fee' => 0), array('range' => $this->input->post('target')));
					echo json_encode(array('status' => 'success'));
				}
				break;
			case 'gpool':
				$gpool = $this->getDataRow('global_fee', '*', array('pkey' => $this->input->post('data')))[0];
				$account = $this->getDataRow('account', 'crypto', array('pkey' => $this->id))[0];

				if ($gpool['price'] > $account['crypto']) { //saldo cukup tidak ?
					echo json_encode(['status' => 'Your matic is not enough']);
					die;
				}

				$chekList = $this->getDataRow('global_list', '*', array('refkey' => $this->id, 'globalkey' => $this->input->post('data')));
				if (count($chekList) >= $gpool['limit']) {
					echo json_encode(['status' => 'Your Limit to Buy']);
					die;
				}

				if ($gpool['count'] < $gpool['limit_count']) {
					$this->set('account', array('pkey' => $this->id), array('crypto', 'crypto -' . $gpool['price'], false));
					$this->insert('logs', array('targetkey' => $this->id, 'refkey' => $this->id, 'time' => strtotime('now'), 'note' => 'Burn G-Pools', 'value' => '-' . $gpool['price']));

					$this->set('global_fee', array('pkey' => $this->input->post('data')), array('count', 'count +1', false)); //tambah count 
					$this->insert('global_list', array('refkey' => $this->id, 'globalkey' => $this->input->post('data')));
					echo json_encode(['status' => 'success']);
					die;
				} else {
					echo json_encode(['status' => 'This Fulli']);
					die;
				}
				break;
			default:
				echo json_encode(array('status' => 'nothing Action'));
				break;
		}
	}
}
