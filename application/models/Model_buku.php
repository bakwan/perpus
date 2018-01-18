<?php
class Model_buku extends ci_model{
    private $table="ms_buku";
    private $primary="id_buku";
    
    function select_all(){
    	$query= "SELECT tb1.id_buku,tb1.judul,tb1.jenis,tb1.penerbit,tb2.nama,tb2.lokasi,tb1.ISBN
    			FROM ms_buku as tb1,ms_kategori tb2	
    			WHERE tb1.kategori_id=tb2.kategori_id";
    			return $this->db->query($query);
    }
    function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table,$limit,$offset);
    }
    
    function simpan($cover,$file){
        if($cover==NULL){
    		$data=array(
                    'kategori_id'      =>  $this->input->post('kategori_id'),
                    'jenis'            =>  $this->input->post('jenis'),
                    'judul'            =>  $this->input->post('judul'),
                    'abstract'         =>  $this->input->post('abstract'),
                    'ISBN'             =>  $this->input->post('ISBN'),
                    'penulis'          =>  $this->input->post('penulis'),
                    'penerbit'         =>  $this->input->post('penerbit'),
                    'tanggal'          =>  $this->input->post('tanggal'),
                    'file'			   =>  $file,
                    'operator'         =>  $this->input->post('operator'),
                    'judul_seo' 	   =>  seo_title($this->input->post('judul')),
                    'create_at' 	   => date('Y-m-d H:i:s'));
			
		}
		if($file==NULL){
		 	$data=array(
                    'kategori_id'      =>  $this->input->post('kategori_id'),
                    'jenis'            =>  $this->input->post('jenis'),
                    'judul'            =>  $this->input->post('judul'),
                    'abstract'         =>  $this->input->post('abstract'),
                    'ISBN'             =>  $this->input->post('ISBN'),
                    'penulis'          =>  $this->input->post('penulis'),
                    'penerbit'         =>  $this->input->post('penerbit'),
                    'cover'			   =>  $cover,
                    'judul_seo' 	   =>  seo_title($this->input->post('judul')),
                    'tanggal'          =>  $this->input->post('tanggal'),
                    'operator'         =>  $this->input->post('operator'),
                    'create_at' 	   => date('Y-m-d H:i:s'));
		 }
		else{
			$data=array(
                    'kategori_id'      =>  $this->input->post('kategori_id'),
                    'jenis'            =>  $this->input->post('jenis'),
                    'judul'            =>  $this->input->post('judul'),
                    'abstract'         =>  $this->input->post('abstract'),
                    'ISBN'             =>  $this->input->post('ISBN'),
                    'penulis'          =>  $this->input->post('penulis'),
                    'penerbit'         =>  $this->input->post('penerbit'),
                    'tanggal'          =>  $this->input->post('tanggal'),
                    'operator'         =>  $this->input->post('operator'),
                    'cover'			   =>  $cover,
                    'file'			   =>  $file,
                    'judul_seo' 		   =>  seo_title($this->input->post('judul')),
                    'create_at' 	    => date('Y-m-d H:i:s'));
		}
        $this->db->insert('ms_buku',$data);
        echo "<script>alert('berhasil');</script>";
    }
    function update($cover,$file){
    	if($cover==NULL){
    		$data=array(
                    'kategori_id'      =>  $this->input->post('kategori_id'),
                    'jenis'            =>  $this->input->post('jenis'),
                    'judul'            =>  $this->input->post('judul'),
                    'abstract'         =>  $this->input->post('abstract'),
                    'ISBN'             =>  $this->input->post('ISBN'),
                    'penulis'          =>  $this->input->post('penulis'),
                    'penerbit'         =>  $this->input->post('penerbit'),
                    'tanggal'          =>  $this->input->post('tanggal'),
                    'file'			   =>  $file,
                    'judul_seo' 	   =>  seo_title($this->input->post('judul')),
                    'operator'         =>  $this->input->post('operator'),
                    'update_at' 	   => date('Y-m-d H:i:s'));
			
		}
		if($file==NULL){
		 	$data=array(
                    'kategori_id'      =>  $this->input->post('kategori_id'),
                    'jenis'            =>  $this->input->post('jenis'),
                    'judul'            =>  $this->input->post('judul'),
                    'abstract'         =>  $this->input->post('abstract'),
                    'ISBN'             =>  $this->input->post('ISBN'),
                    'penulis'          =>  $this->input->post('penulis'),
                    'penerbit'         =>  $this->input->post('penerbit'),
                    'cover'			   =>  $cover,
                    'judul_seo' 	   =>  seo_title($this->input->post('judul')),
                    'tanggal'          =>  $this->input->post('tanggal'),
                    'operator'         =>  $this->input->post('operator'),
                    'update_at' 	   => date('Y-m-d H:i:s'));
		 }
		else{
			$data=array(
                    'kategori_id'      =>  $this->input->post('kategori_id'),
                    'jenis'            =>  $this->input->post('jenis'),
                    'judul'            =>  $this->input->post('judul'),
                    'abstract'         =>  $this->input->post('abstract'),
                    'ISBN'             =>  $this->input->post('ISBN'),
                    'penulis'          =>  $this->input->post('penulis'),
                    'penerbit'         =>  $this->input->post('penerbit'),
                    'tanggal'          =>  $this->input->post('tanggal'),
                    'operator'         =>  $this->input->post('operator'),
                    'cover'			   =>  $cover,
                    'file'			   =>  $file,
                    'judul_seo' 		   =>  seo_title($this->input->post('judul')),
                    'update_at' 	   => date('Y-m-d H:i:s'));
		}
          $this->db->where('id_buku',$this->input->post('id'));
        $this->db->update('ms_buku',$data);
    }
    function cari($cari){
    	$judul = $cari['judul'];
    	$jenis = $cari['jenis'];
    	$query = $this->db->query("SELECT * FROM ms_buku WHERE jenis='$jenis' AND judul like '%$judul%'");
    	//$this->db->select('*');
    	//$this->db->from($this->table);
    	//$this->db->where('jenis',$cari['jenis']);
        //$this->db->like('judul', );
        //$this->db->or_like("judul",$cari['judul']);
        return $query;
    }    
}