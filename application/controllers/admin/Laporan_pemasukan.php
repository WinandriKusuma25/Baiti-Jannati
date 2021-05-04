<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pemasukan extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Pengeluarandonasi_model');
        $this->load->model('admin/Midtrans_model');
        $this->load->model('admin/Transaksitunai_model');
        $this->load->model('admin/Pemasukannondonasi_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {


        $data['title'] = 'Baiti Jannati | Pengeluaran Donasi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pemasukan_transfer'] = $this->Midtrans_model->showTransaksiMidtransPendingAll();
        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->showPemasukanNonDonasi();
        $data['pemasukan_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunaiKeuangan();
        $data['tahun_transfer'] = $this->Midtrans_model->gettahun();
        $data['tahun_non_donasi'] = $this->Pemasukannondonasi_model->gettahun();
        $data['tahun_tunai'] = $this->Transaksitunai_model->gettahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan_pemasukan/index', $data);
        $this->load->view('templates/footer');
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
            $this->pdf->load_view('admin/laporan_pengeluaran/laporan_pdf', $data);

        }elseif ($nilaifilter == 2) {
            
            $data['title'] = "Laporan Keuangan Filter Bulan";
            $this->load->model('admin/Pengeluarandonasi_model');
            $data['subtitle'] = "Dari bulan : ".$bulanawal.' Sampai bulan : '.$bulanakhir.' Tahun : '.$tahun1;
            $data['filter_pengeluaran_donasi'] = $this->Pengeluarandonasi_model->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pengeluaran keuangan.pdf";
            $this->pdf->load_view('admin/laporan_pengeluaran/laporan_pdf', $data);

        }elseif ($nilaifilter == 3) {
            
            $data['title'] = "Laporan Pemasukan Keuangan Filter Tahun";
            $data['subtitle'] = ' Tahun : '.$tahun2;
            $data['pemasukan_transfer'] = $this->Midtrans_model->filterbytahun($tahun2);
            $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->filterbytahun($tahun2);
            $data['pemasukan_tunai'] = $this->Transaksitunai_model->filterbytahun($tahun2);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pemasukan keuangan.pdf";
            $this->pdf->load_view('admin/laporan_pemasukan/laporan_pdf', $data);

        }
    }        

}