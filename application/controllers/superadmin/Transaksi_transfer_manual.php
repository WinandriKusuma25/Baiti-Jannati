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
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Transfer Manual';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->showTransaksiTransferAll();
        $data['pemasukan_donasi_hari'] = $this->Transaksitransfermanual_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->Transaksitransfermanual_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->Transaksitransfermanual_model->countTahun();
        $data['nominal_all'] = $this->Transaksitransfermanual_model->nominalAll();
        $data['nominal_hari'] = $this->Transaksitransfermanual_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitransfermanual_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitransfermanual_model->nominalTahun();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_transfer_manual/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    
    public function filter()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Transfer Manual';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->filter();
        $data['pemasukan_donasi_hari'] = $this->Transaksitransfermanual_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->Transaksitransfermanual_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->Transaksitransfermanual_model->countTahun();
        $data['nominal_all'] = $this->Transaksitransfermanual_model->nominalAll();
        $data['nominal_hari'] = $this->Transaksitransfermanual_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitransfermanual_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitransfermanual_model->nominalTahun();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_transfer_manual/index', $data);
        $this->load->view('templates/superadmin/footer');
    }




    public function detail($id_transfer)
    {
        $data['title'] = 'Baiti Jannati | Detail Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->getTransaksiTransferManualDetail($id_transfer);
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_transfer_manual/detail', $data);
        $this->load->view('templates/superadmin/footer');
    }

   


}