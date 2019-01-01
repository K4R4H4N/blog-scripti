<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoriler_model extends CI_Model {

	public function get_all(){
		
        $result = $this->db->get("brkdndr_kategoriler")->result();
        
        return $result;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("brkdndr_kategoriler")->row();
        
        return $result;
	}
    
    public function insert($data){
                
        $insert = $this->db->insert("brkdndr_kategoriler", $data);
        return $insert;
		
	}
    
    public function update($where, $data){
		
        $update = $this->db->where($where)->update("brkdndr_kategoriler", $data);
        return $update;
	}
    
    public function delete($where){
		
        $delete = $this->db->where($where)->delete("brkdndr_kategoriler");
        return $delete;
	}

    public function kategori_getir($kategori_url)
    {
        $this->db->where('brkdndr_kategoriler.kategori_url', $kategori_url);
        $query = $this->db->get('brkdndr_kategoriler');
        return $query->row();
    }
    public function kategori_getir_id($kategori_id){
        $this->db->where('id', $kategori_id);
        $query = $this->db->get('brkdndr_kategoriler');
        return $query->row();
    }
}
