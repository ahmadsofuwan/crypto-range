<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Forgot extends MY_Controller
{
	public function index()
	{
		$this->load->view('forgot/forgot');
	}
	public function sendCode()
	{
		$chekUsername = $this->getDataRow('account', '*', array('username' => $this->input->post('username')));
		if (count($chekUsername) == 0) {
			echo json_encode(['status' => false, 'msg' => 'Username Not Found']);
		} else {
			$code = rand(1000, 9999);
			$this->update('account', array('verification' => $code, 'verificationtime' => strtotime('+5 minute')), array('username' => $this->input->post('username')));
			//kirim code ke wa
			$phone = preg_replace('/[^0-9]/', '', $chekUsername[0]['phone']);

			$test = $this->HttpClient('http://mymatic.online:8000/blash', array(
				'phone' => $phone . '%40c.us',
				'massage' => 'this is code : ' . $code,
			));

			echo json_encode(['status' => true, 'msg' => 'Success Send Code']);
		}
	}

	public function verifyCode()
	{
		$chekUsername = $this->getDataRow('account', '*', array('username' => $this->input->post('username')));
		if (count($chekUsername) == 0) {
			$this->session->set_flashdata('msg', 'Username Not Found');
			redirect(base_url('Forgot'));
		} else if ($chekUsername[0]['verificationtime'] < strtotime('now')) {
			$this->session->set_flashdata('msg', 'Expired Code');
			redirect(base_url('Forgot'));
		} else if ($chekUsername[0]['verification'] <> $chekUsername[0]['verification']) {
			$this->session->set_flashdata('msg', 'Wrong Code');
			redirect(base_url('Forgot'));
		} else {
			$newdata = array(
				'id'  => $chekUsername[0]['pkey'],
				'name'  => $chekUsername[0]['name'],
				'role'     => $chekUsername[0]['role'],
				'username' => $chekUsername[0]['username'],
				'login' => false
			);
			$this->session->set_userdata($newdata);
			redirect(base_url('Forgot/chngePassword'));
		}
	}
	public function chngePassword()
	{
		$this->load->view('forgot/changepassword');
	}
	public function newpassword()
	{
		$password = $this->input->post('password');
		$newPassword = $this->input->post('newpassword');

		if ($password <> $newPassword) {
			$this->session->set_flashdata('msg', 'passwords are not the same');
			redirect(base_url('Forgot/chngePassword'));
		} else {
			$this->update('account', array('password' => md5($password)), array('pkey' => $this->id));
			redirect(base_url('Auth'));
		}
	}
}
