<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sitemap extends CI_Controller {


    /**
     * Index Page for this controller.
     *
     */
    public function index()
    {
        $this->load->database();
        
        //Yazılar
        $query = $this->db->get("yazilar");
        $data['items'] = $query->result();
        
        //Sayfalar
        $query = $this->db->get("sayfalar");
        $data['sayfas'] = $query->result();
        
        //Kategoriler
        $query = $this->db->get("kategoriler");
        $data['kategoris'] = $query->result();
		
		//Etiketler
        //$query = $this->db->get("etiketler");
        //$data['etikets'] = $query->result();


        $this->load->view('sitemap', $data);
    }
}