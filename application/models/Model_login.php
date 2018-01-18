<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function getlogin($u,$p)
	{	
		$condition = "usrpw_pgw =" . "'" . $u . "' AND " . "paspw_pgw =" . "'" .md5($p). "' AND usrpw_pgw IN (SELECT username FROM ms_user ) ";
		$this->db->select('*');
		$this->db->from('siatex_masterdb.ms_pegawai');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query -> row_array();
			$this->session->set_userdata($row);
			$this->session->set_flashdata('success', 'Selamat anda berhasil login sebagai administrator');
			redirect('Admin/Dashboard');
		} 
		else {
			$this->session->set_flashdata('info','tidak bisa login, karena nama dan password tidak sama dengan data yang ada di database,silahkan ulangi dan pastikan nama dan password benar 100%!!');
			redirect('Login');
		}


		
	}

}
