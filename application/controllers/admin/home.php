<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/user_model');
        $this->load->model('admin/pengeluarandonasi_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Beranda';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['transaksi_donasi_tunai'] = $this->pengeluarandonasi_model->count('transaksi_donasi_tunai');
        $data['pengeluaran_donasi'] = $this->pengeluarandonasi_model->count('pengeluaran_donasi');
        $data['statistics'] = $this->pengeluarandonasi_model->getStatistics();
        $data['chart'] = $this->pengeluarandonasi_model->getDateforChart();
        $data['month'] = $this->pengeluarandonasi_model->getMonth();


        // $data['donasi_non_keuangan'] = $this->donasinonkeuangan_model->countBulan('donasi_non_keuangan');

        // Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['tdt'] = [];
        $data['pd'] = [];

        foreach ($bln as $b) {
            $data['tdt'][] = $this->pengeluarandonasi_model->chartTransaksiDonasiTunai($b);
            $data['pd'][] = $this->pengeluarandonasi_model->chartPengeluaranDonasi($b);
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