<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_tunai extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/transaksitunai_model');
        $this->load->model('admin/pengurus_model');
        $this->load->model('admin/user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Tunai';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->transaksitunai_model->showDonasiTransaksiTunai();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Baiti Jannati | Detail Anak Didik';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['users'] = $this->transaksitunai_model->getTransaksiTunaiUser($id);
        $data['pengurus'] = $this->transaksitunai_model->getTransaksiTunaiPengurus($id);
        $data['transaksi_tunai'] = $this->transaksitunai_model->getDonasiTransaksiTunai($id);
        $data['transaksi_tunai_tgl'] = $this->transaksitunai_model->getTransaksiTunaiTglDonasi($id);
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

        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->transaksitunai_model->showDonasiTransaksiTunai();
        $data['pengurus'] = $this->pengurus_model->showPengurus();
        $data['users'] = $this->user_model->tampilUserSaja();


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
            $upload = $this->transaksitunai_model->upload();
            if ($upload['result'] == 'success') {
                $this->transaksitunai_model->tambahTransaksiTunai($upload);
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
}