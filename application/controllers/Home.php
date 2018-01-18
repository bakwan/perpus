<?php
class Home extends CI_Controller {
	private $limit=10;
	function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Model_buku');
    }
	function index($offset=0,$order_column='id_buku',$order_type='asc'){
        $buku = $this->db->count_all('ms_buku');
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_buku';
        if(empty($order_type)) $order_type='asc';
		//load data
		$data['row']=$this->Model_buku->semua($this->limit,$offset,$order_column,$order_type)->result();
		$config['base_url'] = site_url('Home/index/');
		$config['total_rows'] = $buku;
		$config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
		$this->templet->load('template','Home/index',$data);
	}
	function cari_buku(){
		$cari['judul']=$this->input->post('cari');
		$cari['jenis']=$this->input->post('jenis');
		$data['hasil']=$this->Model_buku->cari($cari)->result();	
		$this->templet->load('template','Home/cari_buku',$data);
	}
	function buku_detail(){
			//nama seo ndak masuk
			$id            = $this->uri->segment(3);
            $data['kategori'] = $this->db->get_where('ms_kategori', array('kategori_id' => $id))->row_array();
            $data['row']   = $this->db->get_where('ms_buku',array('id_buku'=>$id))->row_array();
            $this->templet->load('template','home/buku_detail',$data);
			
			//Kategori nggak masuk
			//nama seo masuk
			//$id            = $this->uri->segment(3);
            ///$data['kategori'] = $this->db->get_where('ms_kategori', array('kategori_id' => $id))->row_array();
          	//$data['row']= $this->db->get_where('ms_buku',array('judul_seo'=>$this->uri->segment(3)))->row_array();
            //$this->templet->load('template','home/buku_detail',$data);
	}
}