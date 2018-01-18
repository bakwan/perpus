<?php class Laporan extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('Model_laporan','Model_aman'));
        $this->Model_aman->getAman();
    }
    
    function Siswa(){
        $data['siswa']=$this->Model_laporan->semuaSiswa()->result();
        $this->templet->load('templateadmin','admin/laporan/siswa',$data);
    }
    
    function buku(){
        $data['buku']=$this->Model_laporan->semuaBuku()->result();
        $this->templet->load('templateadmin','admin/laporan/buku',$data);
    }
    
    function pinjam(){
        $data['title']="Laporan Peminjaman";
        $tanggal1=$this->input->post('tanggal1');
        $tanggal2=$this->input->post('tanggal2');
        $data['lap']=$this->Model_laporan->detailpeminjaman($tanggal1,$tanggal2)->result();
        $this->templet->load('templateadmin','admin/laporan/peminjaman',$data);
    }
    
    function cari_pinjaman(){
        $tanggal1=$this->input->post('tanggal1');
        $tanggal2=$this->input->post('tanggal2');
        $data['lap']=$this->Model_laporan->detailpeminjaman($tanggal1,$tanggal2)->result();
        $this->load->view('admin/laporan/cari_pinjaman',$data);
    }
    
    function kembali(){
        $data['title']="Data Pengembalian";
       $this->templet->load('templateadmin','admin/laporan/pengembalian',$data);
    }
    
    function cari_pengembalian(){
        $tanggal1=$this->input->post('tanggal1');
        $tanggal2=$this->input->post('tanggal2');
        $data['lap']=$this->Model_laporan->detailpengembalian($tanggal1,$tanggal2)->result();
        $this->load->view('admin/laporan/cari_pengembalian',$data);
    }

    function export_buku () {
        header("Content-type:application/vnd.ms-excel");
        header("Content-disposition:attachment; filename=\"Buku.xls\""); 
        header("Pragma:no-cache");
        header("Cache-Control:must-revalidate, post-check=\"0\", pre-check=\"0\"");
        header("Expires:0"); 
        $data['buku']=$this->Model_laporan->semuaBuku()->result();
        $this->load->view('admin/laporan/buku_export',$data);

    }
    function export_pinjam(){
		header("Content-type:application/vnd.ms-excel");
        header("Content-disposition:attachment; filename=\"paloran pinjaman.xls\""); 
        header("Pragma:no-cache");
        header("Cache-Control:must-revalidate, post-check=\"0\", pre-check=\"0\"");
        header("Expires:0");
        $tanggal1=$this->input->post('tanggal1');
        $tanggal2=$this->input->post('tanggal2');
        $data['lap']=$this->Model_laporan->detailpeminjaman($tanggal1,$tanggal2)->result();
        $this->load->view('admin/laporan/pinjam_export',$data);
	}
	function export_kembali(){
		header("Content-type:application/vnd.ms-excel");
        header("Content-disposition:attachment; filename=\"paloran pengembalian.xls\""); 
        header("Pragma:no-cache");
        header("Cache-Control:must-revalidate, post-check=\"0\", pre-check=\"0\"");
        header("Expires:0");
        $tanggal1=$this->input->post('tanggal1');
        $tanggal2=$this->input->post('tanggal2');
        $data['lap']=$this->Model_laporan->detailpengembalian($tanggal1,$tanggal2)->result();
        $this->load->view('admin/laporan/kembali_export',$data);
	}
}