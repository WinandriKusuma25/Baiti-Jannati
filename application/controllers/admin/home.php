<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/user_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Beranda';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        // $data['donasi_tunai'] = $this->donasitunai_model->count('donasi_tunai');
        // $data['donasi_non_keuangan'] = $this->donasitunai_model->count('donasi_non_keuangan');


        // $data['donasi_non_keuangan'] = $this->donasinonkeuangan_model->countBulan('donasi_non_keuangan');

        // Line Chart
        // $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        // $data['dnk'] = [];

        // foreach ($bln as $b) {
        //     $data['dnk'][] = $this->donasinonkeuangan_model->chartDonasiNonKeuangan($b);
        // }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/home/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footer_dark');
    }
}