<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_transfer_manual extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Transaksitransfermanual_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Transfer Manual';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->showTransaksiTransferAll();
        $data['pemasukan_donasi_hari'] = $this->Transaksitransfermanual_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->Transaksitransfermanual_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->Transaksitransfermanual_model->countTahun();
        $data['nominal_all'] = $this->Transaksitransfermanual_model->nominalAll();
        $data['nominal_hari'] = $this->Transaksitransfermanual_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitransfermanual_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitransfermanual_model->nominalTahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_transfer_manual/index', $data);
        $this->load->view('templates/footer');
    }

    
    public function filter()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Transfer Manual';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->filter();
        $data['pemasukan_donasi_hari'] = $this->Transaksitransfermanual_model->countHari();
        $data['pemasukan_donasi_bulan'] = $this->Transaksitransfermanual_model->countBulan();
        $data['pemasukan_donasi_tahun'] = $this->Transaksitransfermanual_model->countTahun();
        $data['nominal_all'] = $this->Transaksitransfermanual_model->nominalAll();
        $data['nominal_hari'] = $this->Transaksitransfermanual_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitransfermanual_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitransfermanual_model->nominalTahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_transfer_manual/index', $data);
        $this->load->view('templates/footer');
    }




    public function detail($id_transfer)
    {
        $data['title'] = 'Baiti Jannati | Detail Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->getTransaksiTransferManualDetail($id_transfer);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_transfer_manual/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id_transfer)
    {
        if ($this->Transaksitransfermanual_model->hapus($id_transfer) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/transaksi_transfer_manual');
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
            redirect('admin/transaksi_transfer_manual');
        }
    }

    public function edit($id_transfer)
    {

        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->getTransaksiTransferManualDetail($id_transfer);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('id_transfer', 'id_transfer', 'required|numeric');
        $this->form_validation->set_rules('status', 'status', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati | Edit Status Transaksi ';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/transaksi_transfer_manual/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Transaksitransfermanual_model->ubahTransaksi();
            $this->load->library('session');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diedit ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/transaksi_transfer_manual', 'refresh');
        }
    }


}