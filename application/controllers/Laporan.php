<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/Pengeluarandonasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Laporan Donasi';
        // $data['pengaturan'] = $this->Pengaturan_model->showPengaturan();
        // $data['anak_didik'] = $this->Anakdidik_model->showAnakDidik();
        $this->load->view('template/header', $data);
        $this->load->view('laporan', $data);
        $this->load->view('template/footer', $data);
    }
}