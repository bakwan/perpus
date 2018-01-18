<?php

class Login extends CI_Controller {
	
	function index(){
		$this->load->view('admin/login');
	}
	function get_login(){
		
		$u = $this->input->post('nmapg_pgw');
		$p = $this->input->post('paspw_pgw');
		$this->load->model('model_login');
		$this->model_login->getlogin($u,$p);
		$this->session->set_userdata('nmapg_pgw', $valid_user->nmapg_pgw);

	}
	function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Selamat anda berhasil logout dari aplikasi perpustakaan, pastikan password tetap menjadi rahasia seperti rahasia jodoh yang Tuhan berikan');
        redirect('Login');
	}
}