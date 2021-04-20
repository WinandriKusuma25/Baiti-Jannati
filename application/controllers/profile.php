<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/Anakdidik_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/Pengaturan_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Profil';
        $data['pengaturan'] = $this->Pengaturan_model->showPengaturan();
        $data['anak_didik'] = $this->Anakdidik_model->showAnakDidik();
        $this->load->view('template/header', $data);
        $this->load->view('profile', $data);
        $this->load->view('template/footer', $data);
    }
}