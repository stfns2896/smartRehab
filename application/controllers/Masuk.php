<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Masuk extends CI_Controller {
	public function index(){
		$this->load->view('login');
	}
	public function login(){
        $this->load->model('M_Pengguna');
		$username = $this->security->xss_clean(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    	$password = $this->security->xss_clean(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $user=$this->M_Pengguna->get_pengguna(array('username'=>$username),array('username','password','tipe'));
        if ($user['username']) {
            if (password_verify($password,$user['password'])) {
                $data_session = array(
                'username' => $username,
                'status' => "login",
                'tipe' => $user['tipe']);
                $this->session->set_userdata($data_session);
                redirect('/');
            }else{
                $this->session->set_flashdata('response', 'Password Salah!!');
                redirect('masuk');
            }
        }else{
           $this->session->set_flashdata('response', 'Username tidak ada!!');
           redirect('masuk');
        }	
	}
}