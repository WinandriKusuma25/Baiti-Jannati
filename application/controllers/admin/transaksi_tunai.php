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
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Tunai';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunai();
        // $data['transaksi_tunai'] = $this->Transaksitunai_model->filter();
        $data['transaksi_tunai_hari'] = $this->Transaksitunai_model->countHari();
        $data['transaksi_tunai_bulan'] = $this->Transaksitunai_model->countBulan();
        $data['transaksi_tunai_tahun'] = $this->Transaksitunai_model->countTahun();
        $data['nominal_hari'] = $this->Transaksitunai_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitunai_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitunai_model->nominalTahun();
        $data['nominal_all'] = $this->Transaksitunai_model->nominalAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Baiti Jannati | Detail Transaksi Donasi Tunai';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['users'] = $this->Transaksitunai_model->getTransaksiTunaiUser($id);
        $data['pengurus'] = $this->Transaksitunai_model->getTransaksiTunaiPengurus($id);
        $data['transaksi_tunai'] = $this->Transaksitunai_model->getDonasiTransaksiTunai($id);
        $data['transaksi_tunai_tgl'] = $this->Transaksitunai_model->getTransaksiTunaiTglDonasi($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {

        $this->form_validation->set_rules('tgl_donasi', 'Tgl. Doanasi', 'required|trim');
        // $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        // $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        // $this->form_validation->set_rules('foto', 'Foto', 'required|trim');

        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunai();
        $data['pengurus'] = $this->Pengurus_model->showPengurus();
        $data['users'] = $this->User_model->tampilUserSaja();


        // var_dump($this->form_validation->run());
        // die();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Transaksi Donasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/transaksi_tunai/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload = $this->Transaksitunai_model->upload();
            if ($upload['result'] == 'success') {
                $this->Transaksitunai_model->tambahTransaksiTunai($upload);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data berhasil di tambahkan ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('admin/transaksi_tunai');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function filter()
    {
        $this->form_validation->set_rules('startdate', 'startdate', 'required|trim');
        $this->form_validation->set_rules('enddate', 'enddate', 'required|trim');
        $startdate = $this->input->get('startdate', TRUE);
        $enddate = $this->input->get('enddate', TRUE);
        // die($startdate . "===" . $enddate);
        $data['title'] = 'Baiti Jannati | Transaksi Tunai Donasi ';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        // $data['nominal_terbesar'] = $this->Transaksitunai_model->nominalTerbesar();
        $data['transaksi_tunai'] = $this->Transaksitunai_model->filter();
        $data['transaksi_tunai_hari'] = $this->Transaksitunai_model->countHari();
        $data['transaksi_tunai_bulan'] = $this->Transaksitunai_model->countBulan();
        $data['transaksi_tunai_tahun'] = $this->Transaksitunai_model->countTahun();
        $data['nominal_hari'] = $this->Transaksitunai_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitunai_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitunai_model->nominalTahun();
        $data['nominal_all'] = $this->Transaksitunai_model->nominalAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/index', $data);
        $this->load->view('templates/footer');
    }
}