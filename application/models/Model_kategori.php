<?php
class Model_kategori extends ci_model{
    
    function select_all(){
        return $this->db->get('ms_kategori');
    }
    
    function select_parent(){
        return $this->db->get_where('tabel_kategori',array('parent'=>0));
    }
    
    
    function simpan(){
        $data=array(
                    'nama'     			=>  $this->input->post('nama'),
                    'lokasi'            =>  $this->input->post('lokasi'),
                    'create_at' 		=> date('Y-m-d H:i:s'));
        $this->db->insert('ms_kategori',$data);
    }
    
    
    function update(){
        $data=array(
                    'nama'     			=>  $this->input->post('nama'),
                    'lokasi'            =>  $this->input->post('lokasi'),
                    'update_at' 		=> date('Y-m-d H:i:s'));
        $this->db->where('kategori_id',$this->input->post('id'));
        $this->db->update('ms_kategori',$data);
    }
}