<?php
class Transaksi extends CI_Controller{
    
	    function __construct() {
	        parent::__construct();
	        date_default_timezone_set("Asia/Jakarta");
	        $this->load->model(array('Model_transaksi','Model_aman'));
	        $this->Model_aman->getAman();
	    }
	  
		function index(){
			$data['transaksi']=$this->Model_transaksi->get_all()->result();
	        $this->templet->load('templateadmin','admin/transaksi/data',$data);
	    }
	    function input(){
	        $data['tanggalpinjam']=date('Y-m-d');
	        $data['tanggalkembali'] = strtotime('+7 day',strtotime($data['tanggalpinjam']));
	        $data['noauto']=$this->Model_transaksi->nootomatis();
	        $data['siswa']=  $this->db->get('siatex_masterdb.ms_siswa')->result();
	        $data['tanggalkembali'] = date('Y-m-d', $data['tanggalkembali']);
			$this->templet->load('templateadmin','admin/transaksi/input',$data);
		}
		
	    function tampil(){
	        $query = "SELECT * FROM ms_tampil ORDER BY ISBN";
	        $data['tmp']= $this->db->query($query)->result();
	        $this->load->view('admin/Transaksi/tampil',$data);
	    }
	    function carisiswa(){
	        $nisis_sis=$this->input->post('nisis_sis');
	        $siswa=$this->Model_transaksi->carisiswa($nisis_sis);
	        if($siswa->num_rows()>0){
	            $siswa=$siswa->row_array();
	            echo $siswa['nmasw_sis'];
	        }
	    }
	    function cariBuku(){
	        $ISBN=$this->input->post('ISBN');
	        $buku=$this->Model_transaksi->cariBuku($ISBN);
	        if($buku->num_rows()>0){
	            $buku=$buku->row_array();
	            echo $buku['judul'];
	        }
	    }
	    function tambah(){
	        $ISBN=$this->input->post('ISBN');
	        $cek=$this->Model_transaksi->cekTmp($ISBN);
	        if($cek->num_rows()<1){
	            $data=array(
	                'ISBN'=>$this->input->post('ISBN'),
	                'judul'=>$this->input->post('judul'),
	                'jumlah'=>$this->input->post('jumlah')
	            );
	            $this->Model_transaksi->simpanTmp($data);
	        }
	    }
	     function simpan(){
	        print_r($tmp);
			$info=array(
                'id_transaksi'		=>$this->input->post('nomer'),
                'nis'				=>$this->input->post('nisis_sis'),
                'tanggal_pinjam'	=>$this->input->post('pinjam'),
                'tanggal_kembali'	=>$this->input->post('kembali'),
                'operator'			=>$this->input->post('operator'),
                'create_at' 	   => date('Y-m-d H:i:s'),
                'status'			=>"Pinjam"
            );
	            //simpan ke transaksi
            $this->Model_transaksi->simpan($info);
	        $tmp=$this->Model_transaksi->Tampil()->result();
	        foreach($tmp as $row){
	            
	            //masukan ke transaksi detail
	            $ISBN=$this->input->post('ISBN');
	            $data=array(
	            	'id_transaksi'		=>$this->input->post('nomer'),
	                'jumlah'			=>$row->jumlah,
	                'ISBN'				=>$row->ISBN
	            );
	            $this->Model_transaksi->simpanDtl($data);
	            //hapus dari tampil	
	           $this->Model_transaksi->hapusTmp($row->ISBN);
	        }
	    }
	    
	    function hapus(){
	        $this->db->where('ISBN',$this->uri->segment(4));
			$this->db->delete('ms_tampil');
			redirect('admin/Transaksi/input');
		}
		
	    function kembali(){
				$data['tanggal']   =date('Y-m-d');
				$id                = $this->uri->segment(4);
		        $data['row']       = $this->db->get_where('ms_transaksi',array('id_transaksi'=>$id))->row_array();
		        $data['kembali']   = $this->db->get_where('ms_kembali',array('id_transaksi'=>$id))->row_array();
		        $sql="SELECT tb1.*,tb2.judul, tb2.penerbit 
				  	  FROM ms_transaksi_detail as tb1,ms_buku as tb2
				  	  WHERE tb1.ISBN=tb2.ISBN AND tb1.id_transaksi=$id";
            	$data['detail']    = $this->db->query($sql)->result();
            	$data['siswa']     = $this->db->get_where('siatex_masterdb.ms_siswa',array('nmasw_sis'=>$id))->row_array();
        		$this->templet->load('templateadmin','admin/kembali/data',$data);
		}
		function cariTransaksi(){
			$no=$this->input->post('no');
			$transaksi=$this->Model_transaksi->cariTransaksi($no);
			if($transaksi->num_rows()>0){
				$transaksi=$transaksi->row_array();
				echo $transaksi['nis']."|".$transaksi['tanggal_pinjam']."|".$transaksi['tanggal_kembali']."|".$transaksi['nmasw_sis'];
			}	
		}
		function edittam(){
			if(isset($_POST['submit'])){
            $this->Model_transaksi->edittam();
            $this->session->set_flashdata('success', 'data kategori dan lokasi berhasil edit');
            redirect('admin/Transaksi/input');
	        }else{
	            $id            = $this->uri->segment(4);
	            $data['row']   = $this->db->get_where('ms_tampil',array('ISBN'=>$id))->row_array();
	            $this->templet->load('templateadmin','admin/Transaksi/edittam',$data);
	        }
		}
		function tampilBuku(){
	        $no=$_GET['no'];
	        $data['buku']=$this->Model_transaksi->tampilBuku($no)->result();
	        $transaksi=$this->Model_transaksi->cariTransaksi($no)->row_array();
	        
	        $this->load->view('admin/kembali/tampil',$data);
	    }
		function detail(){
				$id            = $this->uri->segment(4);
				$data['siswa']   = $this->db->get_where('siatex_masterdb.ms_siswa',array('nisis_sis'=>$id))->row_array();
		        $data['row']   = $this->db->get_where('ms_transaksi',array('id_transaksi'=>$id))->row_array();
		        $sql="SELECT tb1.*,tb2.judul, tb2.penerbit 
				  FROM ms_transaksi_detail as tb1,ms_buku as tb2
				  WHERE tb1.ISBN=tb2.ISBN AND tb1.id_transaksi=$id";
            	$data['detail'] = $this->db->query($sql)->result();
				$data['kembali']= $this->db->get_where('ms_kembali',array('id_transaksi'=>$id))->row_array();
				$this->templet->load('templateadmin','admin/transaksi/detail',$data);
		}
		function simpankem(){
			if(isset($_POST['submit'])){
				$this->Model_transaksi->simpankem();
				$this->Model_transaksi->editstat();
				 $this->session->set_flashdata('success', 'pengembalian buku berhasil di simpan');
	            redirect('admin/Transaksi');
	        }else{
	           $data['tanggal']=date('Y-m-d');
				$id            = $this->uri->segment(4);
		        $data['row']   = $this->db->get_where('ms_transaksi',array('id_transaksi'=>$id))->row_array();
		        $sql="SELECT tb1.*,tb2.judul, tb2.penerbit 
				  	  FROM ms_transaksi_detail as tb1,ms_buku as tb2
				  	  WHERE tb1.ISBN=tb2.ISBN AND tb1.id_transaksi=$id";
            	$data['detail'] = $this->db->query($sql)->result();
		        $data['siswa']=  $this->db->get('siatex_masterdb.ms_siswa')->result();
        		$this->templet->load('templateadmin','admin/kembali/data',$data);
	        	}	
		}
		function perpanjang(){
			if(isset($_POST['submit'])){
				$this->Model_transaksi->perpanjang($data);
				 $this->session->set_flashdata('success', 'data perpanjang berhasil dibuat');
	            redirect('admin/Transaksi');
	        }else{
	        	$data['tanggal']=date('Y-m-d');
				$id            = $this->uri->segment(4);
		        $data['row']   = $this->db->get_where('ms_transaksi',array('id_transaksi'=>$id))->row_array();
		        $sql="SELECT tb1.*,tb2.judul, tb2.penerbit 
				  	  FROM ms_transaksi_detail as tb1,ms_buku as tb2
				  	  WHERE tb1.ISBN=tb2.ISBN AND tb1.id_transaksi=$id";
            	$data['detail'] = $this->db->query($sql)->result();
		        $data['siswa']   = $this->db->get_where('siatex_masterdb.ms_siswa',array('nisis_sis'=>$id))->row_array();
        		$this->templet->load('templateadmin','admin/perpanjang/data',$data);
	        	}	
		}   
		function delete(){
			$this->db->where('id_transaksi',$this->uri->segment(4));
			$this->db->delete('ms_transaksi');
			$this->session->set_flashdata('success','data berhasil di hapus');
			redirect('admin/transaksi');
		}
   	} 