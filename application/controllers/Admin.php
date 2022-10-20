<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->login && $this->role <> 1) {
			redirect(base_url('Auth'));
		}
	}

	public function index()
	{
		$saldo = $this->getDataRow('account', '*', array('pkey' => $this->id));
		$data['html']['saldo'] = $saldo;
		$data['html']['title'] = 'Dasboard';
		$this->template($data);
	}
	public function bypasLogin($id)
	{
		$dataUser = $this->getDataRow('account', '*', array('pkey' => $id))[0];
		$newdata = array(
			'id'  => $dataUser['pkey'],
			'name'  => $dataUser['name'],
			'role'     => $dataUser['role'],
			'img' => $dataUser['img'],
			'username' => $dataUser['username'],
			'login' => true
		);
		$this->session->set_userdata($newdata);
		redirect(base_url());
	}

	public function farmingList()
	{
		$tableName = 'farming';
		$join = array(
			array('account', 'account.pkey=' . $tableName . '.createon', 'left'),
			array('role', 'role.pkey=account.role', 'left'),
		);
		$select = '
			' . $tableName . '.*,
			account.name as createname,
			account.role as createrole,
			role.name as rolename,
		';

		$dataList = $this->getDataRow($tableName, $select, '', '', $join);
		$data['html']['title'] = 'List Farming';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/farming';
		$data['url'] = 'admin/farmingList';
		$this->template($data);
	}

	public function farming($id = '')
	{
		$tableName = 'farming';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'name' => 'name',
			'price' => 'price',
			'labelkey' => 'labelKey',
			'percentage' => 'percentage',
			'createon' => 'sesionid',
			'time' => 'time',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();
			if (empty($_POST['name']))
				array_push($arrMsgErr, 'Nama Wajib Di isi');
			if (empty($_POST['price']))
				array_push($arrMsgErr, 'Harga Wajib Di isi');
			if (empty($_POST['percentage']))
				array_push($arrMsgErr, 'Persentasi Wajib Di isi');

			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
		}
		$label = $this->getDataRow('label', '*');

		$data['html']['label'] = $label;
		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['title'] = 'Input Farming';
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}

	public function labelList()
	{
		$tableName = 'label';
		$join = array(
			array('account', 'account.pkey=' . $tableName . '.createon', 'left'),
			array('role', 'role.pkey=account.role', 'left'),
		);
		$select = '
			' . $tableName . '.*,
			account.name as createname,
			account.role as createrole,
			role.name as rolename,
		';

		$dataList = $this->getDataRow($tableName, $select, '', '', $join);
		$data['html']['title'] = 'List Label';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/label';
		$data['url'] = 'admin/labelList';
		$this->template($data);
	}
	public function label($id = '')
	{
		$tableName = 'label';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'label' => 'label',
			'icon' => 'icon',
			'class' => 'class',
			'createon' => 'sesionid',
			'time' => 'time',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();
			if (empty($_POST['label']))
				array_push($arrMsgErr, 'Label Wajib Di isi');

			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
		}

		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['title'] = 'Input Icons';
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}
	public function referral($id = '')
	{
		$tableName = 'percentage_refferal';


		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			//validate form
			$arrMsgErr = array();
			// if (empty($_POST['label']))
			// 	array_push($arrMsgErr, 'Label Wajib Di isi');

			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr))) {
				// unset($_POST['ref'][0]);
				// unset($_POST['pkey'][0]);
				$chekData = $this->getDataRow($tableName);
				$listDelete = [];
				foreach ($chekData as $key => $value) {
					array_push($listDelete, $value['pkey']);
				}

				for ($i = 1; $i < count($_POST['pkey']); $i++) {
					if (empty($_POST['pkey'][$i])) {
						$this->insert($tableName, array('percentage' => $_POST['ref'][$i]));
					} else {
						$this->update($tableName, array('percentage' => $_POST['ref'][$i]), array('pkey' => $_POST['pkey'][$i]));
						//penghapusan list di hapus
						foreach ($listDelete as $key => $value) {
							if ($_POST['pkey'][$i] == $value) {
								unset($listDelete[$key]);
							}
						}
					}
				}
				print_r($listDelete);
				if (count($listDelete) <> 0) {
					foreach ($listDelete as $key => $value) {
						$this->delete($tableName, array('pkey' => $listDelete[$key]));
					}
				}
			}
		}
		$data = $this->getDataRow($tableName, '*', '', '', '', $tableName . '.pkey ASC');
		$data['html']['data'] = $data;
		$data['html']['title'] = 'Input Icons';
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__;
		$this->template($data);
	}

	public function widrawList()
	{
		$tableName = 'widraw';

		$join = array(
			array('account', 'account.pkey=' . $tableName . '.refkey', 'left'),
		);
		$select = '
			' . $tableName . '.*,
			account.username as username
			';

		$dataList = $this->getDataRow($tableName, $select, '', '', $join);
		$data['html']['title'] = 'List Widraw';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/';
		$data['url'] = 'admin/widrawList';
		$this->template($data);
	}





	public function userList()
	{
		if ($this->session->userdata('role') != '1')
			redirect(base_url());
		$tableName = 'account';
		$join = array(
			array('role', 'role.pkey=account.role', 'left'),
		);
		$dataList = $this->getDataRow($tableName, 'account.*, role.name as rolename', '', '', $join, 'name ASC');
		$data['html']['title'] = 'List Account';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/user';
		$data['url'] = 'admin/userList';
		$this->template($data);
	}

	public function user($id = '')
	{
		$tableName = 'account';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'name' => 'name',
			'username' => 'username',
			'crypto' => 'crypto',
			'role' => 'role',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();

			if (empty($_POST['password']) && $_POST['action'] == 'add')
				array_push($arrMsgErr, "Password wajib Di isi");
			if ($_POST['role'] == '1')
				unset($_POST['detailKey']);



			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$formData['password'] = array('password', 'md5');
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						if (!empty($_POST['password']))
							$formData['password'] = array('password', 'md5');
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
			$_POST['password'] = '';
		}
		$selVal = $this->getDataRow('role', '*', '', '', '', 'name ASC');

		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['selVal'] = $selVal;
		$data['html']['title'] = 'Input ' . __FUNCTION__;
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}

	public function ajax()
	{
		if (empty($_POST['action'])) {
			echo 'no action';
			die;
		}
		switch ($_POST['action']) {
			case 'delete':
				switch ($_POST['tbl']) {
					default:
						$this->delete($_POST['tbl'], array('pkey' => $_POST['pkey']));
						break;
				}
				break;
			case 'accept':
				$status = 'success';
				$chekData = $this->getDataRow('widraw', '*', array('pkey' => $_POST['pkey']))[0];
				if ($chekData['status'] == 0 && $status == 'success') {
					$this->update('widraw', array('status' => 1), array('pkey' => $_POST['pkey']));
					$this->insert('logs', array(
						'targetkey' => $chekData['refkey'],
						'refkey' => $chekData['refkey'],
						'time' => strtotime('now'),
						'note' => 'Withdraw',
						'value' => '-' . $chekData['crypto'],
					));
				}
				echo json_encode(['status' => $status]);
				break;
			case 'rijeck':
				$data = $this->getDataRow('widraw', '*', array('pkey' => $_POST['pkey']))[0];
				$this->update('widraw', array('status' => 2), array('pkey' => $_POST['pkey']));
				$this->insert('logs', array(
					'targetkey' => $data['refkey'],
					'refkey' => $data['refkey'],
					'time' => strtotime('now'),
					'note' => 'Withdraw failed',
					'value' => '0',
				));
				echo json_encode(['status' => 'success']);
				break;
			default:
				echo  $_POST['action'] . ' action is not in the list';
				break;
		}
	}
}
