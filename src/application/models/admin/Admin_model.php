<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function get($where = array()){
		$row = $this->db->where($where)->get("uyeler")->row();
        return $row;
	}
    
    function istatistikler(){
        $data['yazi_sayisi'] = $this->db->count_all('yazilar');
        $data['yorum_sayisi'] = $this->db->count_all('yazi_yorumlar');
        $data['ziyaretci_sayisi'] = $this->db->count_all('yazilar');
        $data['iletisim_mesaj_sayisi'] = $this->db->count_all('iletisim');
        ## Toplam Görüntülenme Sayısı ##
        $this->db->select_sum('yazi_goruntulenme');
        $result = $this->db->get('yazilar')->row();
        $data['yazi_goruntulenme'] =  $result->yazi_goruntulenme;
        ## Toplam Görüntülenme Sayısı ##

        return $data;
        
        
        
    }
}
