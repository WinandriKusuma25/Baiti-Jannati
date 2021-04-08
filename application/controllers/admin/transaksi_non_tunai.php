<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_non_tunai extends CI_Controller
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
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Non Tunai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->midtrans_model->showTransaksiMidtransAll();
        $data['pemasukan_donasi_hari'] = $this->midtrans_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->midtrans_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->midtrans_model->countTahun();
        $data['nominal_all'] = $this->midtrans_model->nominalAll();
        $data['nominal_hari'] = $this->midtrans_model->nominalHari();
        $data['nominal_bulan'] = $this->midtrans_model->nominalBulan();
        $data['nominal_tahun'] = $this->midtrans_model->nominalTahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_non_tunai/index', $data);
        $this->load->view('templates/footer');
    }

    public function filter()
    {


        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Non Tunai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->midtrans_model->filter();
        $data['pemasukan_donasi_hari'] = $this->midtrans_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->midtrans_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->midtrans_model->countTahun();
        $data['nominal_all'] = $this->midtrans_model->nominalAll();
        $data['nominal_hari'] = $this->midtrans_model->nominalHari();
        $data['nominal_bulan'] = $this->midtrans_model->nominalBulan();
        $data['nominal_tahun'] = $this->midtrans_model->nominalTahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_non_tunai/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($order_id)
    {
        $data['title'] = 'Baiti Jannati | Detail Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->midtrans_model->getTransaksiMidtransDetail($order_id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_non_tunai/detail', $data);
        $this->load->view('templates/footer');
    }
}