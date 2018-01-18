<?php
class Buku extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('Model_buku','Model_aman'));
        $this->Model_aman->getAman();
    }
  
	function index(){
        $data['buku']=  $this->Model_buku->select_all()->result();
        $this->templet->load('templateadmin','admin/buku/data',$data);
    }
    function post(){
    	if(isset($_POST['submit'])){
			$config = array(
				'upload_path' 		=> './assets/images/',
				'allowed_types'		=> 'jpg|png|pdf',
				'remove_space'		=> 'TRUE',
				'overwrite'			=> 'FALSE',
				'encrypt_type'		=> 'TRUE',
				'max_size'			=> '2048');
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile_1')){
				$userfile_1 = array('upload_data'=>$this->upload->data());
				$dataupload['image1_rng']= str_replace("","_",$userfile_1['upload_data']['file_name']);
			}
			if($this->upload->do_upload('userfile_2')){
				$userfile_2 = array('upload_data'=>$this->upload->data());
				$dataupload['pdf_rng']= str_replace("","_",$userfile_2['upload_data']['file_name']);
			}
	        $this->Model_buku->simpan($dataupload['image1_rng'],$dataupload['pdf_rng']);
	        $this->session->set_flashdata('success', 'Selamat Data buku berhasil di buat');
	        redirect('admin/Buku');
			}
			else{	
			$data['categori']= $this->db->get('ms_kategori')->result();
			$data['buku']=  $this->Model_buku->select_all()->result();
	        $this->templet->load('templateadmin','admin/buku/post',$data);
			}
    	
	}
	function detail(){
			$id            = $this->uri->segment(4);
            $data['kategori'] = $this->db->get_where('ms_kategori', array('kategori_id' => $id))->row_array();
            $data['row']   = $this->db->get_where('ms_buku',array('id_buku'=>$id))->row_array();
            $this->templet->load('templateadmin','admin/buku/detail',$data);
	}
	function edit(){
		if(isset($_POST['submit'])){
			$config = array(
				'upload_path' 		=> './assets/images/',
				'allowed_types'		=> 'jpg|png|pdf',
				'remove_space'		=> 'TRUE',
				'overwrite'			=> 'FALSE',
				'encrypt_type'		=> 'TRUE',
				'max_size'			=> '2048');
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile_1')){
				$userfile_1 = array('upload_data'=>$this->upload->data());
				$dataupload['image1_rng']= str_replace("","_",$userfile_1['upload_data']['file_name']);
			}
			if($this->upload->do_upload('userfile_2')){
				$userfile_2 = array('upload_data'=>$this->upload->data());
				$dataupload['pdf_rng']= str_replace("","_",$userfile_2['upload_data']['file_name']);
			}
	        	$this->Model_buku->update($dataupload['image1_rng'],$dataupload['pdf_rng']);
	            $this->session->set_flashdata('success', 'selamat data buku berhasil diedit');
	            redirect('admin/Buku');
	        		}
	        	else{
	            $id            = $this->uri->segment(4);
	            $data['row']   = $this->db->get_where('ms_buku',array('id_buku'=>$id))->row_array();
	           	$data['kategori']=  $this->db->get('ms_kategori')->result();
	            $this->templet->load('templateadmin','admin/buku/edit',$data);
	        }
	}
	function delete(){
		$this->db->where('id_buku',$this->uri->segment(4));
		$this->db->delete('ms_buku');
		$this->session->set_flashdata('success', 'selamat data buku berhasil hapus');
		redirect('admin/Buku');
	}
      
  }  
    