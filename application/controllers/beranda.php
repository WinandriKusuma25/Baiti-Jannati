<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/Pengaturan_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }

    public function index()
    {
        $data['pengaturan'] = $this->Pengaturan_model->showPengaturan();
        $data['title'] = 'Baiti Jannati | Beranda';
        $this->load->view('template/header', $data);
        $this->load->view('index', $data);
        $this->load->view('template/footer', $data);
    }
}