<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_tunai extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/transaksitunai_model');
        $this->load->model('admin/pengurus_model');
        $this->load->model('admin/user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Tunai';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->transaksitunai_model->showDonasiTransaksiTunai();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_detail_donasi)
    {
        $data['title'] = 'Baiti Jannati | Detail Anak Didik';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->transaksitunai_model->getDonasiTransaksiTunai($id_detail_donasi);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/detail', $data);
        $this->load->view('templates/footer', $data);
    }
}