<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_donasi extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Pengeluarandonasi_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
        // $this->load->library('pdf');
    }

    public function index()
    {

        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Pengeluaran Donasi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->showPengeluaranDonasi();
        $data['pengeluaran_donasi_hari'] = $this->Pengeluarandonasi_model->countHari();
        $data['pengeluaran_donasi_bulan'] = $this->Pengeluarandonasi_model->countBulan();
        $data['pengeluaran_donasi_tahun'] = $this->Pengeluarandonasi_model->countTahun();
        $data['nominal_hari'] = $this->Pengeluarandonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->Pengeluarandonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->Pengeluarandonasi_model->nominalTahun();
        $data['nominal_all'] = $this->Pengeluarandonasi_model->nominalAll();
        // var_dump($data);
        // die();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pengeluaran_donasi/index', $data);
        $this->load->view('templates/superadmin/footer');
    }


    public function filter()
    {
        // $this->form_validation->set_rules('startdate', 'startdate', 'required|trim');
        // $this->form_validation->set_rules('enddate', 'enddate', 'required|trim');
        // $startdate = $this->input->get('startdate', TRUE);
        // $enddate = $this->input->get('enddate', TRUE);

        $this->session->unset_userdata('startdate');
        $this->session->unset_userdata('enddate');
        // die($startdate . "===" . $enddate);
        $data['title'] = 'Baiti Jannati | Pengeluaran Donasi ';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        // $data['nominal_terbesar'] = $this->Pengeluarandonasi_model->nominalTerbesar();
        $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->filter();
        // $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->showPengeluaranDonasiFilter(array($startdate, $enddate));
        $data['pengeluaran_donasi_hari'] = $this->Pengeluarandonasi_model->countHari();
        $data['pengeluaran_donasi_bulan'] = $this->Pengeluarandonasi_model->countBulan();
        $data['pengeluaran_donasi_tahun'] = $this->Pengeluarandonasi_model->countTahun();
        $data['nominal_hari'] = $this->Pengeluarandonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->Pengeluarandonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->Pengeluarandonasi_model->nominalTahun();
        $data['nominal_all'] = $this->Pengeluarandonasi_model->nominalAll();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pengeluaran_donasi/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function detail($id_pengeluaran)
    {
        $data['title'] = 'Baiti Jannati | Detail Pengeluaran Donasi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->getPengeluaranDonasi($id_pengeluaran);
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pengeluaran_donasi/detail', $data);
        $this->load->view('templates/superadmin/footer', $data);
    }

    // public function pdf(){
       
    //     $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->showPengeluaranDonasi();
    //     $data['nominal_hari'] = $this->Pengeluarandonasi_model->nominalHari();
    //     $data['nominal_bulan'] = $this->Pengeluarandonasi_model->nominalBulan();
    //     $data['nominal_tahun'] = $this->Pengeluarandonasi_model->nominalTahun();
    //     $data['nominal_all'] = $this->Pengeluarandonasi_model->nominalAll();
    //     $this->pdf->setPaper('A4', 'potrait');
	// 	$this->pdf->filename = "Pengeluaran.pdf"; 
	// 	$this->pdf->set_option('isRemoteEnabled', true);
	// 	$this->pdf->load_view('admin/pengeluaran_donasi/laporan_pdf', $data);	
    // }
}