<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yazilar extends CI_Controller {

public function __construct(){
     parent::__construct();

    $user = $this->session->userdata("user");

    if(!$user){
        redirect(base_url("admin"));
    }
}

public function index(){

    $list = $this->yazilar_model->get_all();

    $viewData["list"] = $list;

    //2 Adet data gönderme
    $data = array(
    'list' => $list,
    'title' => "Yazılar | Admin Paneli",
    );
    $this->load->view("admin/yazilar", $data);
}

public function update_form($id){
    $etikets = "";
    $count = 0;
    $etikets_array = $this->etiketler_model->yazi_etiketleri($id);
//        if (is_array($etikets_array) || is_object($etikets_array)){
    foreach ($etikets_array as $item) {
        if ($count > 0) {
            $etikets .= ",";
        }
        $etikets .= $item->etiket;
        $count++;
    }
//        }

    $where = array(
        "id" => $id
    );

    $list = $this->yazilar_model->kategoriler_v2();
    $viewData["list"] = $list;
    $yazilar = $this->yazilar_model->get($where);


    $data = array(
    'yazilar' => $yazilar,
    'list' => $list,
    'etikets' => $etikets,
    'title' => "Yazı Düzenle | Admin Paneli"
    );
    $data['yazi_icerik'] = $this->yazilar_model->get($where);
    if (is_null($data['yazi_icerik']->yazi_durum) || ($id == '')) {
        redirect(base_url("admin/yazilar"));
    }

    $this->load->view("admin/yazi_duzenle", $data);
}

public function update($id){

    $img = $_FILES["yazi_resim"]["name"];

    if($img){

        $config["upload_path"]   = "uploads/";
        $config["allowed_types"] = "gif|jpg|png";

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("yazi_resim");

        if($upload){

            if($this->input->post("yazi_url") == '') {
                $yazi_url2 = str_slug($this->input->post("yazi_baslik"));
            } else {
                $yazi_url2 = $this->input->post("yazi_url");
            }

            //Resim varsa
            $data = array(
                "yazi_baslik" => $this->input->post("yazi_baslik"),
                "kategori_id" => $this->input->post("yazi_kategori"),
                "yazar_id" => $this->input->post("yazar_id"),
                "yazi_resim" => $this->upload->data("file_name"),
                "yazi_icerik" => $this->input->post("yazi_icerik"),
                "yazi_url" => $yazi_url2,
                "yazi_durum" => $this->input->post("yazi_durum"),
                "updatedAt" => date("Y-m-d H:i:s")
            );
        } else {

            $alert = array(
                "title" => "İşlem Başarısızdır!!",
                "text" => "Upload işlemi sırasında bir hata oluştu...",
                "type" => "error"
            );
        }



    } else {
        if($this->input->post("yazi_url") == '') {
            $yazi_url2 = str_slug($this->input->post("yazi_baslik"));
        } else {
            $yazi_url2 = $this->input->post("yazi_url");
        }
        //Resim yoksa
        $data = array(
            "yazi_baslik" => $this->input->post("yazi_baslik"),
            "kategori_id" => $this->input->post("yazi_kategori"),
            "yazar_id" => $this->input->post("yazar_id"),
            "yazi_icerik" => $this->input->post("yazi_icerik"),
            "yazi_url" => $yazi_url2,
            "yazi_durum" => $this->input->post("yazi_durum"),
            "updatedAt" => date("Y-m-d H:i:s")
        );

    }
    $where = array(
        "id" => $id,
    );

    $this->etiketler_model->yazi_etiket_guncelle($id);
    $update = $this->yazilar_model->update($where, $data);

    if($update){

        $alert = array(
            "title" => "İşlem Başarılıdır",
            "text" => "Güncelleme işlemi başarılıdır...",
            "type" => "success"
        );
    }
    else{
        $alert = array(
            "title" => "İşlem Başarısızdır!!",
            "text" => "Güncelleme işlemi başarısızdır...",
            "type" => "error"
        );
    }

    $this->session->set_flashdata("alert", $alert);
    redirect(base_url("admin/yazilar"));
}

public function insert_form(){

    $list = $this->yazilar_model->kategoriler_v2();
    $viewData["list"] = $list;
    $data = array(
        'list' => $list,
        'title' => "Yazı Ekle | Admin Paneli"
    );

    $this->load->view("admin/yazi_ekle", $data);
}

public function insert(){

        $yazi_baslik = $this->input->post("yazi_baslik");
        $kategori_id = $this->input->post("yazi_kategori");
        $yazar_id    = $this->input->post("yazar_id");
        $yazi_icerik = $this->input->post("yazi_icerik");
        if($this->input->post("yazi_url") == '') {
            $yazi_url = str_slug($this->input->post("yazi_baslik"));
        } else {
            $yazi_url = $this->input->post("yazi_url");
        }
        $yazi_durum  = $this->input->post("yazi_durum");
        $createdAt   = date("Y-m-d H:i:s");
        $img         = $_FILES["yazi_resim"]["name"];

        if($yazi_baslik && $kategori_id && $yazar_id && $yazi_icerik){

            if($img){

            $config["upload_path"]   = "uploads/";
            $config["allowed_types"] = "gif|jpg|png";

            $this->load->library("upload", $config);

            if($this->upload->do_upload("yazi_resim")){

                $yazi_resim = $this->upload->data("file_name");

                $data = array(
                    "yazi_baslik"   => $yazi_baslik,
                    "kategori_id"   => $kategori_id,
                    "yazar_id"      => $yazar_id,
                    "yazi_resim"    => $yazi_resim,
                    "yazi_icerik"   => $yazi_icerik,
                    "yazi_url"      => $yazi_url,
                    "yazi_durum"    => $yazi_durum,
                    "createdAt"     => $createdAt
                );

                $insert = $this->yazilar_model->insert($data);



                if($insert){
                    $alert = array(
                        "title" => "İşlem Başarılıdır",
                        "text" => "Ekleme işlemi başarılıdır...",
                        "type" => "success"
                    );
                    $last_id = $this->db->insert_id();
                    $this->etiketler_model->yazi_etiket_ekle($last_id);
                }
                else{
                    $alert = array(
                        "title" => "İşlem Başarısızdır!!",
                        "text" => "Ekleme işlemi başarısızdır...",
                        "type" => "error"
                    );
                }

            }else{

                $alert = array(
                    "title" => "İşlem Başarısızdır!!",
                    "text" => "Resim yükleme işlemi başarısızdır...",
                    "type" => "error"
                );
            }
            } else {

                $data = array(
                    "yazi_baslik"   => $yazi_baslik,
                    "kategori_id"   => $kategori_id,
                    "yazar_id"      => $yazar_id,
                    "yazi_icerik"   => $yazi_icerik,
                    "yazi_url"      => $yazi_url,
                    "yazi_durum"    => $yazi_durum,
                    "createdAt"     => $createdAt
                );

                $insert = $this->yazilar_model->insert($data);

                if($insert){
                    $alert = array(
                        "title" => "İşlem Başarılıdır",
                        "text" => "Ekleme işlemi başarılıdır...",
                        "type" => "success"
                    );
                    $last_id = $this->db->insert_id();
                    $this->etiketler_model->yazi_etiket_ekle($last_id);
                }
                else{
                    $alert = array(
                        "title" => "İşlem Başarısızdır!!",
                        "text" => "Ekleme işlemi başarısızdır...",
                        "type" => "error"
                    );
                }

            }

        }else{

            $alert = array(
                "title" => "İşlem Başarısızdır!!",
                "text" => "Lütfen boş alan bırakmayınız...",
                "type" => "error"
            );
        }


        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("admin/yazilar"));


    }

public function delete($id){

    $where = array(
        "id" => $id
    );

    $delete = $this->yazilar_model->delete($where);

    if($delete){

        $alert = array(
            "title" => "İşlem Başarılıdır!!",
            "text" => "Silme işlemi başarılıdır...",
            "type" => "success"
        );
    }else {

        $alert = array(
            "title" => "İşlem Başarısızdır!!",
            "text" => "Silme işlemi başarısızdır...",
            "type" => "error"
        );
    }

    $this->session->set_flashdata("alert", $alert);
    redirect(base_url("admin/yazilar"));
}


}