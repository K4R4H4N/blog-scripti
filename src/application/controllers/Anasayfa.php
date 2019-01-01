<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends Genel_MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('fonksiyonlar');
    }

    public function index(){

        //sayfalama
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $config['base_url'] = base_url();
        $config['total_rows'] = $this->anasayfa_model->yazi_sayisi();
        $config['per_page'] = $this->ayarlar->anasayfa_yazi_sayisi;
        $this->pagination->initialize($config);

        //Ayarları veritabanından getirme
        $genel_ayarlar = $this->ayarlar_model->get_all();
        //Yazıların listesini veritabanından getirme
        $yazi_listesi = $this->anasayfa_model->sayfalama_yazilari($config['per_page'], $sayfa * $config['per_page']);

        $ktg_list = $this->yazilar_model->kategoriler_v2();
        $viewData["list"] = $ktg_list;

        $data = array(
            'kategoriler' => $ktg_list,
            'yazi_listesi' => $yazi_listesi,
            'genel_ayarlar' => $genel_ayarlar
        );
        $this->load->view("anasayfa", $data);

    }

    public function yazi_icerik($url){

        $data["kategoriler"] = $this->yazilar_model->kategoriler_v2();

        $yazi_url_v2 = $this->security->xss_clean($url);
        $data['yazi_icerik'] = $this->anasayfa_model->anasayfa_yazi_icerik($yazi_url_v2);

        $id = $data['yazi_icerik']->id;
        $data['yorumlar'] = $this->anasayfa_model->yazi_yorumlari($id);

        $url = $data['yazi_icerik']->yazi_url;

        if (empty($data['yazi_icerik']->yazi_durum) || ($url == '')) {
            redirect(base_url());
        }

//        $data['yorum_sayisi'] = $this->anasayfa_model->yazi_yorum_sayisi($id);
        $data['yazi_etiketler'] = $this->etiketler_model->yazi_etiketleri($id);

        $this->load->view("icerik", $data);

        $this->load->helper('cookie');
        $this->anasayfa_model->yazi_sayaci($id);
    }

    public function yorum_ekle(){

        $yazi_id = $this->input->post("yazi_id");
        $yazi_url = $this->input->post("yazi_url");
        $yorum_ad_soyad = $this->input->post("yorum_ad_soyad");
        $yorum_email    = $this->input->post("yorum_email");
        $yorum_icerik = $this->input->post("yorum_icerik");
        $createdAt   = date("Y-m-d H:i:s");

        if($yorum_ad_soyad && $yorum_email && $yorum_icerik){

            $data = array(
                "yazi_id"   => $yazi_id,
                "yorum_ad_soyad"   => $yorum_ad_soyad,
                "yorum_email"   => $yorum_email,
                "yorum_icerik"   => $yorum_icerik,
                "createdAt"     => $createdAt
            );
            $insert = $this->yorumlar_model->yorum_ekle($data);

            if($insert){
                $alert = array(
                    "title" => "",
                    "message" => "Yorum ekleme işlemi başarılıdır, yorumunuzun görünmesi için yönetici onayı gereklidir.",
                    "type" => "success"
                );
            }
            else{
                $alert = array(
                    "title" => "",
                    "message" => "Yorum ekleme işlemi başarısızdır, lütfen tekrar deneyin.",
                    "type" => "danger"
                );
            }
        }else{

            $alert = array(
                "title" => "",
                "message" => "Lütfen boş alan bırakmayınız...",
                "type" => "danger"
            );
        }


        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("yazi/".$yazi_url));

    }

    public function kategori($kategori_url){

        $kategori_url = $this->security->xss_clean($kategori_url);

        $data['kategori'] = $this->kategoriler_model->kategori_getir($kategori_url);

        if (empty($data['kategori'])) {
            redirect(base_url());
        }

        $kategori_id = $data['kategori']->id;

        $data["kategoriler"] = $this->yazilar_model->kategoriler_v2();

        $data['kategori_title'] = html_escape('"'.$data['kategori']->kategori_adi).'"'.' kategorisine ait yazılar';
        $data['kategori_url'] = $data['kategori']->kategori_url;
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }

        $config['base_url'] = base_url() . '/kategori/' . $kategori_url;
        $config['total_rows'] = $this->anasayfa_model->kategori_yazi_sayisi($kategori_id);
        $config['per_page'] = $this->ayarlar->anasayfa_kategori_sayisi;
        $this->pagination->initialize($config);

        $data['yazilar'] = $this->anasayfa_model->sayfalama_kategorileri($kategori_id, $config['per_page'], $sayfa * $config['per_page']);


        $this->load->view('kategori', $data);

    }

    public function etiket($etiket_url){

        $etiket_url = $this->security->xss_clean($etiket_url);

        $data["kategoriler"] = $this->yazilar_model->kategoriler_v2();
        $data['etiket'] = $this->etiketler_model->etiket_getir($etiket_url);

        if (empty($data['etiket'])) {
            redirect(base_url());
        }

        $etiket_id = $data['etiket']->id;

        $data['etiket'] = html_escape('"'.$data['etiket']->etiket).'"'.' etiketine ait yazılar';

        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }

        $config['base_url'] = base_url() . '/etiket/' . $etiket_url;
        $config['total_rows'] = $this->anasayfa_model->etikete_ait_yazi_sayisi($etiket_url);
        $config['per_page'] = $this->ayarlar->anasayfa_etiket_sayisi;
        $this->pagination->initialize($config);
        $data['etiket_urlsi'] =  base_url() . 'etiket/' . $etiket_url;
        $data['yazilar'] = $this->anasayfa_model->etikete_ait_yazilar_sayfalama($etiket_url, $config['per_page'], $sayfa * $config['per_page']);

        $this->load->view('etiket', $data);
    }

    public function sayfa($sayfa_url){

        $sayfa_url = $this->security->xss_clean($sayfa_url);

        //index page
        if (empty($sayfa_url)) {
            redirect(base_url());
        }

        $data["kategoriler"] = $this->yazilar_model->kategoriler_v2();
        $data['sayfa'] = $this->anasayfa_model->sayfa($sayfa_url);

        if ($data['sayfa']->sayfa_durum == 0 || $data['sayfa']->sayfa_url == '') {
            redirect(base_url());
        } else {
            $data['sayfa_title'] = $data['sayfa']->sayfa_baslik;
            $data['sayfa_icerik'] = $data['sayfa']->sayfa_icerik;
            $data['sayfa_url'] = $data['sayfa']->sayfa_url;
            $this->load->view('sayfa', $data);

        }
    }

    public function arama(){

        $q = $this->input->get('q', TRUE);

        $data['q'] = $q;
        $data['arama_title'] = "'".$q. "' ". html_escape("için arama sonuçları");
        $data['arama_description'] = "'".$q. "' ". html_escape("için arama sonuçları");

        $data["kategoriler"] = $this->yazilar_model->kategoriler_v2();

        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $data['arama_yazi_sayisi'] = $this->anasayfa_model->arama_yazi_sayisi($q);

        $config['base_url'] = base_url() . '/arama?q=' . $q;
        $config['total_rows'] = $data['arama_yazi_sayisi'];
        $config['per_page'] = $this->ayarlar->anasayfa_yazi_sayisi;
        $this->pagination->initialize($config);

        $data['yazilar'] = $this->anasayfa_model->sayfalama_aramalari($q, $config['per_page'], $sayfa * $config['per_page']);

        $this->load->view('arama', $data);
    }

    public function enckokunanlar(){

    }
}
