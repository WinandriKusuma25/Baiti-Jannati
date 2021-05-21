<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_tunai extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Transaksitunai_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/User_model');
        $this->load->model('admin/Kategori_model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Tunai';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunai();
        $data['transaksi_tunai_hari'] = $this->Transaksitunai_model->countHari();
        $data['transaksi_tunai_bulan'] = $this->Transaksitunai_model->countBulan();
        $data['transaksi_tunai_tahun'] = $this->Transaksitunai_model->countTahun();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_tunai/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function filter()
    {
        $this->session->unset_userdata('startdate');
        $this->session->unset_userdata('enddate');
        $data['title'] = 'Baiti Jannati | Transaksi Tunai Donasi ';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->filter();
        $data['transaksi_tunai_hari'] = $this->Transaksitunai_model->countHari();
        $data['transaksi_tunai_bulan'] = $this->Transaksitunai_model->countBulan();
        $data['transaksi_tunai_tahun'] = $this->Transaksitunai_model->countTahun();
        $data['nominal_hari'] = $this->Transaksitunai_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitunai_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitunai_model->nominalTahun();
        $data['nominal_all'] = $this->Transaksitunai_model->nominalAll();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_tunai/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Baiti Jannati | Detail Transaksi Donasi Tunai';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['users'] = $this->Transaksitunai_model->getTransaksiTunaiUser($id);
        // $data['pengurus'] = $this->Transaksitunai_model->getTransaksiTunaiPengurus($id);
        $data['transaksi_tunai'] = $this->Transaksitunai_model->getDonasiTransaksiTunai($id);
        $data['transaksi_tunai_tgl'] = $this->Transaksitunai_model->getTransaksiTunaiTglDonasi($id);
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_tunai/detail', $data);
        $this->load->view('templates/superadmin/footer', $data);
    }

   
    public function tampilKeuangan()
    {
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Tunai';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunaiKeuangan();
        $data['nominal_hari'] = $this->Transaksitunai_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitunai_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitunai_model->nominalTahun();
        $data['nominal_all'] = $this->Transaksitunai_model->nominalAll();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_tunai/tampil_keuangan', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function tampilNonKeuangan()
    {
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Tunai';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunaiNonKeuangan();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/transaksi_tunai/tampil_nonkeuangan', $data);
        $this->load->view('templates/superadmin/footer');
    }

}