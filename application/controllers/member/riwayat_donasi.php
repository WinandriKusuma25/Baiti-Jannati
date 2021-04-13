<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_donasi extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Midtrans_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->Midtrans_model->showTransaksiMidtrans($this->session->userdata('email'));
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/riwayat_donasi/index', $data);
        $this->load->view('templates/member/footer');
    }
    public function detail($order_id)
    {
        $data['title'] = 'Baiti Jannati | Detail Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->Midtrans_model->getTransaksiMidtransDetail($order_id);
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/riwayat_donasi/detail', $data);
        $this->load->view('templates/member/footer', $data);
    }
}