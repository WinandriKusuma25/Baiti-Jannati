<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_non_tunai extends CI_Controller
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
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Non Tunai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->Midtrans_model->showTransaksiMidtransAll();
        $data['pemasukan_donasi_hari'] = $this->Midtrans_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->Midtrans_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->Midtrans_model->countTahun();
        $data['nominal_all'] = $this->Midtrans_model->nominalAll();
        $data['nominal_hari'] = $this->Midtrans_model->nominalHari();
        $data['nominal_bulan'] = $this->Midtrans_model->nominalBulan();
        $data['nominal_tahun'] = $this->Midtrans_model->nominalTahun();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_non_tunai/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function filter()
    {
        $this->session->unset_userdata('startdate');
        $this->session->unset_userdata('enddate');
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Non Tunai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->Midtrans_model->filter();
        $data['pemasukan_donasi_hari'] = $this->Midtrans_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->Midtrans_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->Midtrans_model->countTahun();
        $data['nominal_all'] = $this->Midtrans_model->nominalAll();
        $data['nominal_hari'] = $this->Midtrans_model->nominalHari();
        $data['nominal_bulan'] = $this->Midtrans_model->nominalBulan();
        $data['nominal_tahun'] = $this->Midtrans_model->nominalTahun();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_non_tunai/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function detail($order_id)
    {
        $data['title'] = 'Baiti Jannati | Detail Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->Midtrans_model->getTransaksiMidtransDetail($order_id);
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_non_tunai/detail', $data);
        $this->load->view('templates/superadmin/footer');
    }
}