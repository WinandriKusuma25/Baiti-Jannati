<?php
defined('BASEPATH') or exit('No direct script access allowed');

class riwayat_donasi_tunai extends CI_Controller
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
        $data['title'] = 'Baiti Jannati | Riwayat Donasi Tunai';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->transaksitunai_model->showDonasiTransaksiTunaiMember($this->session->userdata('email'));
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/riwayat_donasi_tunai/index', $data);
        $this->load->view('templates/member/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Baiti Jannati | Detail Riwayat Donasi Tunai';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['users'] = $this->transaksitunai_model->getTransaksiTunaiUser($id);
        $data['pengurus'] = $this->transaksitunai_model->getTransaksiTunaiPengurus($id);
        $data['transaksi_tunai'] = $this->transaksitunai_model->getDonasiTransaksiTunai($id);
        $data['transaksi_tunai_tgl'] = $this->transaksitunai_model->getTransaksiTunaiTglDonasi($id);
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/riwayat_donasi_tunai/detail', $data);
        $this->load->view('templates/member/footer');
    }
}