<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Pengeluarandonasi_model');
        $this->load->model('admin/Pemasukannondonasi_model');
        $this->load->model('admin/Midtrans_model');
        $this->load->model('admin/Transaksitransfermanual_model');
        $this->load->model('admin/Transaksitunai_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Beranda';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_donasi_tunai'] = $this->Pengeluarandonasi_model->count('transaksi_donasi_tunai');
        $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->count('pengeluaran_donasi');
        $data['pengeluaran_donasi_limit'] = $this->Pengeluarandonasi_model->NominalLimit();
        $data['nominal_all'] = $this->Pengeluarandonasi_model->nominalAll();

        //chart pengeluaran
        $data['statistics_pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->getStatistics();
        $data['chart_pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->getDateforChart();
        $data['month_pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->getMonth();

        //chart Pemasukan Non Donasi
        $data['statistics'] = $this->Pengeluarandonasi_model->getStatistics();
        $data['chart'] = $this->Pengeluarandonasi_model->getDateforChart();
        $data['month'] = $this->Pengeluarandonasi_model->getMonth();

         //chart Pemasukan Transfer
        //  $data['statistics_transfer'] = $this->Midtrans_model->getStatistics();
         $data['chart_transfer'] = $this->Midtrans_model->getDateforChart();
         $data['month_transfer'] = $this->Midtrans_model->getMonth();

        //chart Pemasukan Tunai
        $data['chart_tunai'] = $this->Transaksitunai_model->getDateforChart();
        $data['month_tunai'] = $this->Transaksitunai_model->getMonth();

        $data['pengeluaran_donasi_limit'] = $this->Pengeluarandonasi_model->showPengeluaranDonasiLimit();
        $data['pemasukan_non_donasi_limit'] = $this->Pemasukannondonasi_model->showPemasukanNonDonasiLimit();
        $data['pemasukan_transfer_limit'] = $this->Midtrans_model->showTransaksiMidtransLimit();
        $data['pemasukan_tunai_limit'] = $this->Transaksitunai_model->showTransaksiTunaiLimit();
        $data['statistics2'] = $this->Pemasukannondonasi_model->getStatistics();
        $data['char2'] = $this->Pemasukannondonasi_model->getDateforChart();
        $data['month2'] = $this->Pemasukannondonasi_model->getMonth();
        
        //menghitung sisa saldo
        $data['pengeluaran_donasi_hitung'] = $this->Pengeluarandonasi_model->showPengeluaranDonasi();
        $data['transaksi_midtrans_hitung'] = $this->Midtrans_model->showTransaksiMidtransPendingAll();
        $data['transaksi_manual_hitung'] = $this->Transaksitransfermanual_model->showTransaksiSukses();
        $data['transaksi_tunai_hitung'] = $this->Transaksitunai_model->showDonasiTransaksiTunai();
        $data['pemasukan_non_donasi_hitung'] = $this->Pemasukannondonasi_model->showPemasukanNonDonasi();
        $data['transaksi_tunai_hitung'] = $this->Transaksitunai_model->showDonasiTransaksiTunaiKeuangan();



        // $data['donasi_non_keuangan'] = $this->donasinonkeuangan_model->countBulan('donasi_non_keuangan');

        // Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['tdt'] = [];
        $data['pd'] = [];

        foreach ($bln as $b) {
            $data['tdt'][] = $this->Pengeluarandonasi_model->chartTransaksiDonasiTunai($b);
            $data['pd'][] = $this->Pengeluarandonasi_model->chartPengeluaranDonasi($b);
        }
        // var_dump($data2);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/home/index', $data);
        $this->load->view('templates/footer');
    }
}