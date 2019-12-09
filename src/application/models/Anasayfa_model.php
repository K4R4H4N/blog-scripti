<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa_model extends CI_Model {

    public function anasayfa_son_yazilar(){
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.*,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $query = $this->db->get('yazilar')->result();
        return $query;
    }
    public function anasayfa_yazi_icerik($url){
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.* , kategoriler.kategori_adi as kategori_adi, kategoriler.kategori_url as kategori_url, uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->where('yazilar.yazi_url', $url);
        $query = $this->db->get('yazilar');
        return $query->row();
    }

    public function anasayfa_yazi($id){
        $this->db->where('yazilar.id', $id);
        $query = $this->db->get('yazilar');
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
            $this->db->update('yazilar', $data);
        }

    }

    public function yazi_sayisi(){
        $this->db->select('yazilar.*');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->order_by('yazilar.id', 'DESC');
        $query = $this->db->get('yazilar');
        return $query->num_rows();
    }

    public function sayfalama_yazilari($per_page, $offset){
        $this->db->select('yazilar.*,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->order_by('yazilar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('yazilar');
        return $query->result();
    }

    public function insert($data){

        $insert = $this->db->insert("yazilar", $data);
        return $insert;

    }

    public function yazi_yorumlari($id){
        $this->db->join('yazilar', 'yazi_yorumlar.yazi_id = yazilar.id');
        $this->db->where('yazilar.id', $id);
        $this->db->where('yazi_yorumlar.yorum_durum', 1);
        $this->db->select('yazi_yorumlar.*');
        $this->db->order_by('yazi_yorumlar.id', 'DESC');
        $query = $this->db->get('yazi_yorumlar');
        return $query->result();
    }

    public function etikete_ait_yazi_sayisi($etiket_url){
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->join('etiketler', 'yazilar.id = etiketler.yazi_id');
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.* ,etiketler.id as etiket_id,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->where('etiketler.etiket_url', $etiket_url);
        $query = $this->db->get('yazilar');
        return $query->num_rows();
    }

    public function etikete_ait_yazilar_sayfalama($etiket_url, $per_page, $offset){
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->join('etiketler', 'yazilar.id = etiketler.yazi_id');
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.* ,etiketler.id as etiket_id,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->where('etiketler.etiket_url', $etiket_url);
        $this->db->order_by('yazilar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('yazilar');
        return $query->result();
    }

    public function sayfalama_kategorileri($kategori_id, $per_page, $offset){
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.*,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->where('kategori_id', $kategori_id);
        $this->db->order_by('yazilar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('yazilar');
        return $query->result();
    }
    public function kategori_yazi_sayisi($kategori_id){
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.* ,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->where('yazilar.kategori_id', $kategori_id);
        $query = $this->db->get('yazilar');
        return $query->num_rows();
    }

    public function menu_sayfalar(){
        $result = $this->db->get("sayfalar")->result();
        return $result;
    }

    public function enckokunanlar(){
        $this->db->select('yazilar.*');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->order_by('yazilar.yazi_goruntulenme', 'DESC');
        $this->db->limit($this->ayarlar->enckokunan_yazi_sayisi);
        $query = $this->db->get('yazilar');
        return $query->result();
    }

    public function sayfa($sayfa_url)
    {
        $this->db->where('sayfa_url', $sayfa_url);
        $query = $this->db->get('sayfalar');
        return $query->row();
    }

    public function sayfalama_aramalari($q, $per_page, $offset){
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.*,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->like('yazilar.yazi_baslik', $q);
        $this->db->or_like('yazilar.yazi_icerik', $q);
        $this->db->order_by('yazilar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('yazilar');
        return $query->result();
    }
    public function arama_yazi_sayisi($q){
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.*,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->like('yazilar.yazi_baslik', $q);
        $this->db->or_like('yazilar.yazi_icerik', $q);
        $this->db->order_by('yazilar.id', 'DESC');
        $query = $this->db->get('yazilar');
        return $query->num_rows();
    }
}