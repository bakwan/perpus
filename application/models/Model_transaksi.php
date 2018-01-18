<?php
class Model_transaksi extends CI_Model{
	    
	    function nootomatis(){
	        $today=date('Ymd');
	        $query=$this->db->query("select max(id_transaksi) as last from ms_transaksi where id_transaksi like '$today%'");
	        $row = $query->row_array();
	        $lastNoFaktur=$row['last'];
	        
	        $lastNoUrut=substr($lastNoFaktur,8,3);
	        
	        $nextNoUrut=$lastNoUrut+1;
	        
	        $nextNoTransaksi=$today.sprintf('%03s',$nextNoUrut);
	        
	        return $nextNoTransaksi;
	    }
	    
	    function get_all(){
	    	$query="SELECT tb1.id_transaksi,tb1.nis,tb1.status,tb2.nmasw_sis,tb1.tanggal_pinjam,tb1.tanggal_kembali
	                FROM ms_transaksi as tb1,siatex_masterdb.ms_siswa as tb2
	                WHERE tb1.nis=tb2.nisis_sis";
	        return $this->db->query($query);
		}
		function buku(){
			$query="select tb1.judul tb2.*
					form ms_buku as tb1, ms_transaksi_detail as tb2
					WHERE tb1.ISBN=tb2.ISBN";
		}
	    function getSiswa(){
	        $this->db->get('siatex_masterdb.ms_siswa');
	    }
	    function carisiswa($nisis_sis){
	        $this->db->where("nisis_sis",$nisis_sis);
	        return $this->db->get('siatex_masterdb.ms_siswa');
	    }
	    
	    function cariBuku($ISBN){
	        $this->db->where("ISBN",$ISBN);
	        return $this->db->get("ms_buku");
    	}
    	function cekTmp($ISBN){
	        $this->db->where("ISBN",$ISBN);
	        return $this->db->get("ms_tampil");
	    }
	    function Tampil(){
	        return $this->db->get('ms_tampil');
	    }
	    function jumlahTmp(){
	        return $this->db->count_all("ms_tampil");
	        
	    }
	    function jumlahTrans(){
	        return $this->db->count_all("ms_transaksi");
	    }
	    function simpanTmp($data){
	        $this->db->insert("ms_tampil",$data);
	    }
	    function simpanDtl($data){
	        $this->db->insert("ms_transaksi_detail",$data);
	    }
	    function hapusTmp($ISBN){
	        $this->db->where("ISBN",$ISBN);
	        $this->db->delete("ms_tampil");
	    }
	     function simpan($info){
	        $this->db->insert("ms_transaksi",$info);
	    }
		function cariTransaksi($no){
			$query=$this->db->query("select a.*,b.nmasw_sis from ms_transaksi a,
									siatex_masterdb.ms_siswa b
									where a.id_transaksi='$no' and a.id_transaksi
									not in(select id_transaksi from ms_kembali)
									and a.nis=b.nisis_sis");
			return $query;
		}
		function tampilBuku($no){
	        $query=$this->db->query("select a.*,b.judul,b.penerbit
	                                from ms_transaksi a,ms_buku b
	                                where a.id_transaksi='$no' and
	                                a.id_transaksi not in(select id_transaksi from ms_kembali)
	                                and a.ISBN=b.ISBN");
	        return $query;
	    }
	    function simpankem(){	
        $data=array(
                    'id_transaksi'     		=>  $this->input->post('no'),
                    'denda'            		=>  $this->input->post('denda'),
                    'tanggal'				=> 	$this->input->post('tanggal'),
                    'operator'				=> 	$this->input->post('operator'),
		            'create_at' 	    => date('Y-m-d H:i:s')
                    );
        $this->db->insert('ms_kembali',$data);
    	}
    	function editstat(){
					    $data=array(
					    'operator'			=> $this->input->post('operator'),
		                'status'			=>"kembali");
	        $this->db->where('id_transaksi',$this->input->post('id'));
	        $this->db->update('ms_transaksi',$data);
    	}
    	function edittam(){
					    $data=array(
					    'jumlah'			=> $this->input->post('jumlah'));
	        $this->db->where('ISBN',$this->input->post('id'));
	        $this->db->update('ms_tampil',$data);
    	}
    	function perpanjang(){
					    $data=array(
		                'tanggal_kembali'	=>$this->input->post('tanggal_kembali'),
		                'operator'			=>$this->input->post('operator'),
		                'update_at' 	    => date('Y-m-d H:i:s'),
		                'status'			=>"perpanjang");
	        $this->db->where('id_transaksi',$this->input->post('id'));
	        $this->db->update('ms_transaksi',$data);
    	}
   } 