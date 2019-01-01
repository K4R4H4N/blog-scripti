<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa_model extends CI_Model {

    public function anasayfa_son_yazilar(){
        $this->db->join('brkdndr_kategoriler', 'brkdndr_yazilar.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_yazilar.*,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $query = $this->db->get('brkdndr_yazilar')->result();
        return $query;
    }
    public function anasayfa_yazi_icerik($url){
        $this->db->join('brkdndr_uyeler', 'brkdndr_yazilar.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_yazilar.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_yazilar.* , brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url as kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->where('brkdndr_yazilar.yazi_url', $url);
        $query = $this->db->get('brkdndr_yazilar');
        return $query->row();
    }

    public function anasayfa_yazi($id){
        $this->db->where('brkdndr_yazilar.id', $id);
        $query = $this->db->get('brkdndr_yazilar');
        return $query->row();
    }

    public function yazi_sayaci($id){
        $yazilar = $this->anasayfa_model->anasayfa_yazi($id);

        if (get_cookie('yazi_goruntulenme_' . $id) != 1) {
            set_cookie('yazi_goruntulenme_' . $id, '1');
            $data = array(
                'yazi_goruntulenme' => $yazilar->yazi_goruntulenme + 1
            );

            $this->db->where('id', $id);
            $this->db->update('brkdndr_yazilar', $data);
        }

    }

    public function yazi_sayisi(){
        $this->db->select('brkdndr_yazilar.*');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->order_by('brkdndr_yazilar.id', 'DESC');
        $query = $this->db->get('brkdndr_yazilar');
        return $query->num_rows();
    }

    public function sayfalama_yazilari($per_page, $offset){
        $this->db->select('brkdndr_yazilar.*,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->join('brkdndr_uyeler', 'brkdndr_yazilar.yazar_id = brkdndr_uyeler.id');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->order_by('brkdndr_yazilar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_yazilar');
        return $query->result();
    }

    public function insert($data){

        $insert = $this->db->insert("brkdndr_yazilar", $data);
        return $insert;

    }

    public function yazi_yorumlari($id){
        $this->db->join('brkdndr_yazilar', 'brkdndr_yazi_yorumlar.yazi_id = brkdndr_yazilar.id');
        $this->db->where('brkdndr_yazilar.id', $id);
        $this->db->where('brkdndr_yazi_yorumlar.yorum_durum', 1);
        $this->db->select('brkdndr_yazi_yorumlar.*');
        $this->db->order_by('brkdndr_yazi_yorumlar.id', 'DESC');
        $query = $this->db->get('brkdndr_yazi_yorumlar');
        return $query->result();
    }

    public function etikete_ait_yazi_sayisi($etiket_url){
        $this->db->join('brkdndr_uyeler', 'brkdndr_yazilar.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_etiketler', 'brkdndr_yazilar.id = brkdndr_etiketler.yazi_id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_yazilar.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_yazilar.* ,brkdndr_etiketler.id as etiket_id,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->where('brkdndr_etiketler.etiket_url', $etiket_url);
        $query = $this->db->get('brkdndr_yazilar');
        return $query->num_rows();
    }

    public function etikete_ait_yazilar_sayfalama($etiket_url, $per_page, $offset){
        $this->db->join('brkdndr_uyeler', 'brkdndr_yazilar.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_etiketler', 'brkdndr_yazilar.id = brkdndr_etiketler.yazi_id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_yazilar.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_yazilar.* ,brkdndr_etiketler.id as etiket_id,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->where('brkdndr_etiketler.etiket_url', $etiket_url);
        $this->db->order_by('brkdndr_yazilar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_yazilar');
        return $query->result();
    }

    public function sayfalama_kategorileri($kategori_id, $per_page, $offset){
        $this->db->join('brkdndr_uyeler', 'brkdndr_yazilar.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_yazilar.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_yazilar.*,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->where('kategori_id', $kategori_id);
        $this->db->order_by('brkdndr_yazilar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_yazilar');
        return $query->result();
    }
    public function kategori_yazi_sayisi($kategori_id){
        $this->db->join('brkdndr_uyeler', 'brkdndr_yazilar.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_yazilar.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_yazilar.* ,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->where('brkdndr_yazilar.kategori_id', $kategori_id);
        $query = $this->db->get('brkdndr_yazilar');
        return $query->num_rows();
    }

    public function menu_sayfalar(){
        $result = $this->db->get("brkdndr_sayfalar")->result();
        return $result;
    }

    public function enckokunanlar(){
        $this->db->select('brkdndr_yazilar.*');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->order_by('brkdndr_yazilar.yazi_goruntulenme', 'DESC');
        $this->db->limit($this->ayarlar->enckokunan_yazi_sayisi);
        $query = $this->db->get('brkdndr_yazilar');
        return $query->result();
    }

    public function sayfa($sayfa_url)
    {
        $this->db->where('sayfa_url', $sayfa_url);
        $query = $this->db->get('brkdndr_sayfalar');
        return $query->row();
    }

    public function sayfalama_aramalari($q, $per_page, $offset){
        $this->db->join('brkdndr_uyeler', 'brkdndr_yazilar.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_yazilar.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_yazilar.*,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->like('brkdndr_yazilar.yazi_baslik', $q);
        $this->db->or_like('brkdndr_yazilar.yazi_icerik', $q);
        $this->db->order_by('brkdndr_yazilar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_yazilar');
        return $query->result();
    }
    public function arama_yazi_sayisi($q){
        $this->db->join('brkdndr_uyeler', 'brkdndr_yazilar.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_yazilar.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_yazilar.*,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_yazilar.yazi_durum', 1);
        $this->db->like('brkdndr_yazilar.yazi_baslik', $q);
        $this->db->or_like('brkdndr_yazilar.yazi_icerik', $q);
        $this->db->order_by('brkdndr_yazilar.id', 'DESC');
        $query = $this->db->get('brkdndr_yazilar');
        return $query->num_rows();
    }
}