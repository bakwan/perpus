<?php
class Model_Laporan extends CI_Model{
	
    function semuaSiswa(){
        return $this->db->get("siatex_masterdb.ms_siswa");
    }
    
    function semuaBuku(){
    	$query= "SELECT tb1.id_buku,tb1.judul,tb1.jenis,tb1.penerbit,tb2.nama,tb2.lokasi,tb1.ISBN
    			FROM ms_buku as tb1,ms_kategori tb2	
    			WHERE tb1.kategori_id=tb2.kategori_id";
    			return $this->db->query($query);
    }
    function detailpeminjaman($tanggal1,$tanggal2){
        return $this->db->query("select * from ms_transaksi where tanggal_pinjam between '$tanggal1' and '$tanggal2' group by id_transaksi");
    }
    
    function detailpengembalian($tanggal1,$tanggal2){
        return $this->db->query("select * from ms_kembali where tanggal between '$tanggal1' and '$tanggal2' group by id_transaksi");
    }
}
