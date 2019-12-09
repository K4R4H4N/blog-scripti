<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etiketler_model extends CI_Model {

   public function yazi_etiket_ekle($yazi_id){
        //etiket
        $etikets = trim($this->input->post('etiket', true));

        $etiket_array = explode(",", $etikets);
        foreach ($etiket_array as $etiket) {
            $etiket = trim($etiket);
            if (strlen($etiket) > 1) {
                $data = array(
                    'yazi_id' => $yazi_id,
                    'etiket' => trim($etiket),
                    'etiket_url' => str_slug($etiket),
                    'createdAt' => date("Y-m-d H:i:s")
                );
                //etiket ekle
                $this->db->insert('etiketler', $data);
            }
        }
    }
    public function yazi_etiket_guncelle($yazi_id){
        //eski etiketleri sil
        $this->etiketler_model->yazi_etiket_sil($yazi_id);

        $etikets = trim($this->input->post('etiket', true));

        $etikets_array = explode(",", $etikets);
        foreach ($etikets_array as $etiket) {
            $etiket = trim($etiket);
            if (strlen($etiket) > 1) {
                $data = array(
                    'yazi_id' => $yazi_id,
                    'etiket' => trim($etiket),
                    'etiket_url' => str_slug($etiket),
                    'updatedAt' => date("Y-m-d H:i:s")
                );
                //insert tag
                $this->db->insert('etiketler', $data);
            }
        }
    }
    
    public function etiket_getir($etiket_url)
    {
        $this->db->where('etiket_url', $etiket_url);
        $query = $this->db->get('etiketler');
        return $query->row();
    }

    public function yazi_etiketleri($yazi_id){
        $this->db->where('yazi_id', $yazi_id);
        $query = $this->db->get('etiketler');
        return $query->result();
    }
    public function yazi_etiket_sil($yazi_id){
        //etiket ara
        $etikets = $this->etiketler_model->yazi_etiketleri($yazi_id);

        foreach ($etikets as $etiket) {
            //sil
            $this->db->where('id', $etiket->id);
            $this->db->delete('etiketler');
        }
    }

}
