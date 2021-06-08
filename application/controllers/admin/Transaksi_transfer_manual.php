<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_transfer_manual extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Transaksitransfermanual_model');
        is_logged_in();
    }

    public function index()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Transfer Manual';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->showTransaksiTransferAll();
        // $data['pemasukan_donasi_hari'] = $this->Midtrans_model->countHari();
        // $data['pemasukan_donasi_bulan'] = $this->Midtrans_model->countBulan();
        // $data['pemasukan_donasi_tahun'] = $this->Midtrans_model->countTahun();
        // $data['nominal_all'] = $this->Midtrans_model->nominalAll();
        // $data['nominal_hari'] = $this->Midtrans_model->nominalHari();
        // $data['nominal_bulan'] = $this->Midtrans_model->nominalBulan();
        // $data['nominal_tahun'] = $this->Midtrans_model->nominalTahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_transfer_manual/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_transfer)
    {
        $data['title'] = 'Baiti Jannati | Detail Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->getTransaksiTransferManualDetail($id_transfer);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_transfer_manual/detail', $data);
        $this->load->view('templates/footer');
    }

}