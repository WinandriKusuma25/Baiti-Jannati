<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/anakdidik_model');
        $this->load->model('admin/pengurus_model');
        $this->load->model('admin/user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Profil';
        $data['anak_didik'] = $this->anakdidik_model->showAnakDidik();
        $this->load->view('template/header', $data);
        $this->load->view('profile', $data);
        $this->load->view('template/footer', $data);
    }
}