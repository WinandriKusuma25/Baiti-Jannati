<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi_manual extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Transaksitransfermanual_model');
        $this->load->model('admin/Bank_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
      
        $this->form_validation->set_rules('id_bank', 'id_bank', 'required|trim');
        $this->form_validation->set_rules('nominal', 'nominal', 'required|trim');
        $this->form_validation->set_rules('bank', 'bank', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        $this->form_validation->set_rules('no_rekening', 'no_rekening', 'required|trim');
    

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->showTransaksiTransferAll();
        $data['bank'] = $this->Bank_model->showBank();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Transaksi Transfer Manual';
            $this->load->view('templates/member/header', $data);
            $this->load->view('templates/member/sidebar', $data);
            $this->load->view('templates/member/topbar', $data);
            $this->load->view('member/transaksi_transfer_manual/tambah', $data);
            $this->load->view('templates/member/footer');
        } else {
            $upload = $this->Transaksitransfermanual_model->upload();
            if ($upload['result'] == 'success') {
                $this->Transaksitransfermanual_model->addTransaksiManual($upload);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data berhasil di tambahkan, Mohon Tunggu Validasi oleh Admin! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('member/transaksi_transfer_manual');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }
}