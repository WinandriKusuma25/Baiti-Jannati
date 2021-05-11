<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan_pemasukan_nonkeuangan extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        // is_logged_in();
        $this->load->model('admin/Transaksitunai_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
        // $this->load->library('pdf');
    }

    public function index()
    {


        $data['title'] = 'Baiti Jannati | Pemasukan Keuangan';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_non_keuangan'] = $this->Transaksitunai_model->showDonasiTransaksiTunaiNonKeuangan();
        $data['tahun_tunai'] = $this->Transaksitunai_model->gettahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan_pemasukan_nonkeuangan/index', $data);
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
            $data['title'] = "Laporan Non Keuangan Filter Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : ".$tanggalawal.' Sampai tanggal : '.$tanggalakhir;
            $data['transaksi_non_keuangan'] = $this->Transaksitunai_model->filterbytanggalnonkeuangan($tanggalawal,$tanggalakhir);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pemasukan Non keuangan.pdf";
            $this->pdf->load_view('admin/laporan_pemasukan_nonkeuangan/laporan_pdf', $data);

        }elseif ($nilaifilter == 2) {
            
            $data['title'] = "Laporan Pemasukan Non Keuangan Filter Bulan";
            $data['subtitle'] = "Dari bulan : ".$bulanawal.' Sampai bulan : '.$bulanakhir.' Tahun : '.$tahun1;
            $data['transaksi_non_keuangan'] = $this->Transaksitunai_model->filterbybulannonkeuangan($tahun1,$bulanawal,$bulanakhir);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pemasukan Non keuangan.pdf";
            $this->pdf->load_view('admin/laporan_pemasukan_nonkeuangan/laporan_pdf', $data);

        }elseif ($nilaifilter == 3) {
            
            $data['title'] = "Laporan Pemasukan Non Keuangan Filter Tahun";
            $data['subtitle'] = ' Tahun : '.$tahun2;
            $data['transaksi_non_keuangan'] = $this->Transaksitunai_model->filterbytahunnonkeuangan($tahun2);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Pemasukan Non Keuangan.pdf";
            $this->pdf->load_view('admin/laporan_pemasukan_nonkeuangan/laporan_pdf', $data);

        }
    }        

}