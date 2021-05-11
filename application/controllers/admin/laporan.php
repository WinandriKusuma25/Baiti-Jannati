<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/User_model');
        $this->load->model('admin/Midtrans_model');
        $this->load->model('admin/Transaksitunai_model');
        $this->load->model('admin/Pengeluarandonasi_model');
        $this->load->model('admin/Pemasukannondonasi_model');
        // $this->load->library('pdf');
        is_logged_in();
    }

    public function index()
    {

        $data['title'] = 'Baiti Jannati | Laporan Pemasukan dan Pengeluaran Keuangan';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->showPengeluaranDonasi();
        $data['pemasukan_transfer'] = $this->Midtrans_model->showTransaksiMidtransPendingAll();
        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->showPemasukanNonDonasi();
        $data['pemasukan_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunaiKeuangan();
        $data['tahun'] = $this->Midtrans_model->gettahun();
        $data['tahun'] = $this->Pemasukannondonasi_model->gettahun();
        $data['tahun'] = $this->Transaksitunai_model->gettahun();
        $data['tahun'] = $this->Pengeluarandonasi_model->gettahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan/index', $data);
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
            $data['title'] = "Laporan Pemasukan dan Pengeluaran Keuangan Filter Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : ".$tanggalawal.' Sampai tanggal : '.$tanggalakhir;
            $data['pemasukan_transfer'] = $this->Midtrans_model->filterbytanggal($tanggalawal,$tanggalakhir);
            $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->filterbytanggal($tanggalawal,$tanggalakhir);
            $data['pemasukan_tunai'] = $this->Transaksitunai_model->filterbytanggal($tanggalawal,$tanggalakhir);
            $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->filterbytanggal($tanggalawal,$tanggalakhir);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pemasukan dan Pengeluaran keuangan.pdf";
            $this->pdf->load_view('admin/laporan/laporan_pdf', $data);

        }elseif ($nilaifilter == 2) {
            
            $data['title'] = "Laporan Pemasukan dan Pengeluaran Keuangan Filter Bulan";
            $data['subtitle'] = "Dari bulan : ".$bulanawal.' Sampai bulan : '.$bulanakhir.' Tahun : '.$tahun1;
            $data['pemasukan_transfer'] = $this->Midtrans_model->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            $data['pemasukan_tunai'] = $this->Transaksitunai_model->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pemasukan dan Pengeluaran Keuangan.pdf";
            $this->pdf->load_view('admin/laporan/laporan_pdf', $data);

        }elseif ($nilaifilter == 3) {
            
            $data['title'] = "Laporan Pemasukan dan Pengeluaran Keuangan Filter Tahun";
            $data['subtitle'] = ' Tahun : '.$tahun2;
            $data['pemasukan_transfer'] = $this->Midtrans_model->filterbytahun($tahun2);
            $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->filterbytahun($tahun2);
            $data['pemasukan_tunai'] = $this->Transaksitunai_model->filterbytahun($tahun2);
            $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->filterbytahun($tahun2);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pemasukan dan Pengeluaran Keuangan.pdf";
            $this->pdf->load_view('admin/laporan/laporan_pdf', $data);

        }
    }        
}