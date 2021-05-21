<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan_non_donasi extends CI_Controller
{
    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Pemasukannondonasi_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Pemasukan Non Donasi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->showPemasukanNonDonasi();
        $data['pemasukan_non_donasi_hari'] = $this->Pemasukannondonasi_model->countHari();
        $data['pemasukan_non_donasi_bulan'] = $this->Pemasukannondonasi_model->countBulan();
        $data['pemasukan_non_donasi_tahun'] = $this->Pemasukannondonasi_model->countTahun();
        $data['nominal_hari'] = $this->Pemasukannondonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->Pemasukannondonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->Pemasukannondonasi_model->nominalTahun();
        $data['nominal_all'] = $this->Pemasukannondonasi_model->nominalAll();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pemasukan_non_donasi/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function filter()
    {

        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Pemasukan Non Donasi ';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->filter();
        $data['pemasukan_non_donasi_hari'] = $this->Pemasukannondonasi_model->countHari();
        $data['pemasukan_non_donasi_bulan'] = $this->Pemasukannondonasi_model->countBulan();
        $data['pemasukan_non_donasi_tahun'] = $this->Pemasukannondonasi_model->countTahun();
        $data['nominal_hari'] = $this->Pemasukannondonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->Pemasukannondonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->Pemasukannondonasi_model->nominalTahun();
        $data['nominal_all'] = $this->Pemasukannondonasi_model->nominalAll();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pemasukan_non_donasi/index', $data);
        $this->load->view('templates/superadmin/footer');
    }


    public function detail($id_pemasukan)
    {
        $data['title'] = 'Baiti Jannati | Detail Pemasukan Non Donasi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->getPemasukanNonDonasi($id_pemasukan);
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pemasukan_non_donasi/detail', $data);
        $this->load->view('templates/superadmin/footer', $data);
    }
}