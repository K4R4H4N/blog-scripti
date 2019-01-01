<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function get($where = array()){
		$row = $this->db->where($where)->get("brkdndr_uyeler")->row();
        return $row;
	}
    
    function istatistikler(){
        $data['yazi_sayisi'] = $this->db->count_all('brkdndr_yazilar');
        $data['yorum_sayisi'] = $this->db->count_all('brkdndr_yazi_yorumlar');
        $data['ziyaretci_sayisi'] = $this->db->count_all('brkdndr_yazilar');
        $data['iletisim_mesaj_sayisi'] = $this->db->count_all('brkdndr_iletisim');
        ## Toplam Görüntülenme Sayısı ##
        $this->db->select_sum('yazi_goruntulenme');
        $result = $this->db->get('brkdndr_yazilar')->row();
        $data['yazi_goruntulenme'] =  $result->yazi_goruntulenme;
        ## Toplam Görüntülenme Sayısı ##

        return $data;
        
        
        
    }
}
