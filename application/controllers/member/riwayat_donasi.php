<?php
defined('BASEPATH') or exit('No direct script access allowed');

class riwayat_donasi extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/user_model');
        $this->load->model('admin/midtrans_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->midtrans_model->showTransaksiMidtrans();
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/riwayat_donasi/index', $data);
        $this->load->view('templates/member/footer');
    }
}