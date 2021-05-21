<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_non_tunai extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Midtrans_model');
        is_logged_in();
    }

    public function index()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Non Tunai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->Midtrans_model->showTransaksiMidtransAll();
        $data['pemasukan_donasi_hari'] = $this->Midtrans_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->Midtrans_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->Midtrans_model->countTahun();
        $data['nominal_all'] = $this->Midtrans_model->nominalAll();
        $data['nominal_hari'] = $this->Midtrans_model->nominalHari();
        $data['nominal_bulan'] = $this->Midtrans_model->nominalBulan();
        $data['nominal_tahun'] = $this->Midtrans_model->nominalTahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_non_tunai/index', $data);
        $this->load->view('templates/footer');
    }

    public function filter()
    {
        $this->session->unset_userdata('startdate');
        $this->session->unset_userdata('enddate');
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Non Tunai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->Midtrans_model->filter();
        $data['pemasukan_donasi_hari'] = $this->Midtrans_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->Midtrans_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->Midtrans_model->countTahun();
        $data['nominal_all'] = $this->Midtrans_model->nominalAll();
        $data['nominal_hari'] = $this->Midtrans_model->nominalHari();
        $data['nominal_bulan'] = $this->Midtrans_model->nominalBulan();
        $data['nominal_tahun'] = $this->Midtrans_model->nominalTahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_non_tunai/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($order_id)
    {
        $data['title'] = 'Baiti Jannati | Detail Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_midtrans'] = $this->Midtrans_model->getTransaksiMidtransDetail($order_id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_non_tunai/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($order_id)
    {
        if ($this->Midtrans_model->hapusTransaksiNonTunai($order_id) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/transaksi_non_tunai');
        } else {
            $this->load->library('session');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Data berhasil di hapus !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            helper_log("hapus", "hapus donasi transfer");
            redirect('admin/transaksi_non_tunai', 'refresh');
        }
    }
}