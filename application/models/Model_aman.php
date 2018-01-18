<?php
class Model_aman extends CI_Model {
	
	function getAman()
	{
		$username = $this->session->userdata('nmapg_pgw');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}