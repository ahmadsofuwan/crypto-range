<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Refral extends MY_Controller
{
	public function index()
	{
		redirect(base_url('Refral/shere'));
	}
	public function shere($ref = '')
	{
		$data['title'] = 'Refral';
		$data['ref'] = $ref;
		$this->load->view('Refral/refral', $data);
	}
	public function register()
	{
		$cekusername = $this->getDataRow('account', 'username,pkey', array('username' => $this->input->post('username')));
		$refral = $this->getDataRow('account', 'pkey', array('username' => $this->input->post('refral'), 'role' => 2, 'status' => 1))[0]['pkey'];
		if (!empty(count($cekusername)) || empty($refral)) {
			$this->session->set_flashdata('msg', 'Username Telah di gunakan');
			if (empty($refral))
				$this->session->set_flashdata('msg', 'Refral Tidak di temukan');

			$this->session->set_flashdata('post', $_POST);
			redirect(base_url('Refral/shere'));
			die;
		} else if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['refral'])) {
			$this->session->set_flashdata('msg', 'Mohon Isi semua Bidang');
			$this->session->set_flashdata('post', $_POST);
			redirect(base_url('Refral/shere'));
			die;
		}
		if (substr($_POST['phone'], 0, 1) == '0') {
			$_POST['phone'] = '62' . substr($_POST['phone'], 1);
		}
		$data = array(
			'username' => $_POST['username'],
			'phone' => $_POST['phone'],
			'password' => md5($_POST['password']),
			'refkey' => $refral,
			'role' => 2,
			'verification' => rand(1000, 9999),
			'verificationtime' => strtotime('now'),
		);
		$session = $this->insert('account', $data);
		$newdata = array(
			'id'  => $session,
			'role'     => 2,
			'login' => true
		);
		$this->session->set_userdata($newdata);

		$this->insert('range', array('refkey' => $session, 'date' => strtotime('now')));
		$this->set('range', array('range.refkey' => $refral), array('count', 'count + 1', false));



		redirect(base_url('Auth'));
	}
}
