<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pengeluaran extends CI_Controller
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
        $this->load->library('pdf');
    }

    public function index()
    {


        $data['title'] = 'Baiti Jannati | Pengeluaran Donasi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->showPengeluaranDonasi();
        $data['nominal_all'] = $this->Pengeluarandonasi_model->nominalAll();
        $data['tahun'] = $this->Pengeluarandonasi_model->gettahun();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/laporan_pengeluaran/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function filter(){
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');


        if ($nilaifilter == 1) {
            $data['title'] = "Laporan Keuangan Filter Berdasrkan Tanggal";
            $this->load->model('admin/Pengeluarandonasi_model');
            $data['subtitle'] = "Dari tanggal : ".$tanggalawal.' Sampai tanggal : '.$tanggalakhir;
            $data['filter_pengeluaran_donasi'] = $this->Pengeluarandonasi_model->filterbytanggal($tanggalawal,$tanggalakhir);
            $this->pdf->set_option('isRemoteEnabled', true);
            // $data['datafilter2'] = $this->pengeluaran_model->filterbytanggal( $tanggalawal,$tanggalakhir);
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pengeluaran keuangan.pdf";
            $this->pdf->load_view('superadmin/laporan_pengeluaran/laporan_pdf', $data);

        }elseif ($nilaifilter == 2) {
            
            $data['title'] = "Laporan Keuangan Filter Bulan";
            $this->load->model('admin/Pengeluarandonasi_model');
            $data['subtitle'] = "Dari bulan : ".$bulanawal.' Sampai bulan : '.$bulanakhir.' Tahun : '.$tahun1;
            $data['filter_pengeluaran_donasi'] = $this->Pengeluarandonasi_model->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pengeluaran keuangan.pdf";
            $this->pdf->load_view('superadmin/laporan_pengeluaran/laporan_pdf', $data);

        }elseif ($nilaifilter == 3) {
            
            $data['title'] = "Laporan Pengeluaran Keuangan Filter Tahun";
            $this->load->model('admin/Pengeluarandonasi_model');
            $data['subtitle'] = ' Tahun : '.$tahun2;
            $data['filter_pengeluaran_donasi'] = $this->Pengeluarandonasi_model->filterbytahun($tahun2);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pengeluaran keuangan.pdf";
            $this->pdf->load_view('superadmin/laporan_pengeluaran/laporan_pdf', $data);

        }
    }        

}