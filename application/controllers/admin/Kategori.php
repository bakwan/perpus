<?php
class Kategori extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('Model_kategori','Model_aman'));
        $this->Model_aman->getAman();
    }
    
    
    function index(){
        $data['record']=  $this->Model_kategori->select_all()->result();
        $this->templet->load('templateadmin','admin/kategori/data',$data);
    }
    function post(){
        if(isset($_POST['submit'])){
            $this->Model_kategori->simpan();
            $this->session->set_flashdata('success', 'data kategori dan lokasi berhasil dibuat');
            redirect('admin/kategori');
        }else{
        	$this->session->set_flashdata('error', 'Failed, try again !');
            $this->templet->load('templateadmin','admin/kategori/post');
        }
    }
    
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_kategori->update();
            $this->session->set_flashdata('success', 'data kategori dan lokasi berhasil edit');
            redirect('admin/kategori');
        }else{
            $id            = $this->uri->segment(4);
            $data['row']   = $this->db->get_where('ms_kategori',array('kategori_id'=>$id))->row_array();
            $this->templet->load('templateadmin','admin/kategori/edit',$data);
        }
    }
    
    
    function delete(){
        $this->db->where('kategori_id',$this->uri->segment(4));
        $this->db->delete('ms_kategori');
        $this->session->set_flashdata('success', 'kategori deleted');
        redirect('admin/kategori');
    }
}
