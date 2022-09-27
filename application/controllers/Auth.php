<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

    public function index()
    {
        $data['titleLogin'] = $this->getDataRow('profile_company', 'titlelogin', '', '1')[0]['titlelogin'];
        $this->load->view('auth/login', $data);
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $arrWhere = array('username' => $username, 'password' => $password);
        $cek = $this->getDataRow('account', '*', $arrWhere, 1);
        if (count($cek) == 0) {
            $msg = 'Wrong username or password';
            $this->session->set_flashdata('msg', $msg);
            redirect(base_url('Auth'));
        } else {
            foreach ($cek as $row) {
                $newdata = array(
                    'id'  => $row['pkey'],
                    'name'  => $row['name'],
                    'role'     => $row['role'],
                    'img' => $row['img'],
                    'username' => $row['username'],
                    'login' => true
                );
            }
            $this->session->set_userdata($newdata);
            if ($newdata['role'] == '1')
                redirect(base_url('admin'));
            if ($newdata['role'] == '2')
                redirect(base_url());
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('img');
        $this->session->unset_userdata('role');
        session_destroy();
        redirect(base_url('Auth'));
    }
}
