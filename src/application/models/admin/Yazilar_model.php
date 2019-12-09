<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yazilar_model extends CI_Model {

	public function get_all(){
		
        $result = $this->db->get("yazilar")->result();
        
        return $result;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("yazilar")->row();
        
        return $result;
	}

    public function insert($data){

        $insert = $this->db->insert("yazilar", $data);
        return $insert;

    }
    
    public function update($where, $data){
		
        $update = $this->db->where($where)->update("yazilar", $data);
        return $update;
	}
    
    public function delete($where){
		
        $delete = $this->db->where($where)->delete("yazilar");
        return $delete;
	}
    
    //Ziyaretçi sayacı
    function update_counter($id) {
    // return current article views 
    $this->db->where('id', $id);
    $this->db->select('yazi_goruntulenme');
    $count = $this->db->get('yazilar')->row();
    // then increase by one 
    $this->db->where('id', $id);
    $this->db->set('yazi_goruntulenme', ($count->yazi_goruntulenme + 1));
    $this->db->update('yazilar');
    }

    public function kategoriler_v2(){
        $result = $this->db->get("kategoriler")->result();
        return $result;
    }

    public function admin_son_yazilar(){
        $this->db->select('yazilar.*');
        $this->db->where('yazilar.yazi_durum', 1);
        $query = $this->db->get('yazilar')->result();
        return $query;
    }
}
