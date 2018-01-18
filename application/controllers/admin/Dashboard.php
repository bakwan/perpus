<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends ci_controller{
	
     function __construct() {
        parent::__construct();
        $this->load->model(array('Model_aman','Model_transaksi'));
        $this->Model_aman->getAman();
    }
    
    function index(){
        	$data['jumlahTrans']= $this->Model_transaksi->jumlahTrans();
            $this->templet->load('templateadmin','admin/dashboard',$data);
    }
} 