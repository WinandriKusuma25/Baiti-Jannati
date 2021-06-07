<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Bank_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Daftar Bank';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['bank'] = $this->Bank_model->showBank();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/bank/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'required|trim', [
            'required' => 'nama bank tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('no_rekening', 'no_rekening', 'required|trim', [
            'required' => 'no rekening tidak boleh kosong !',
        ]);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['bank'] = $this->Bank_model->showbank();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Data bank';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/bank/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('admin/bank_model');
            $this->bank_model->tambahBank();
         
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            helper_log("tambah", "tambah bank");
            redirect('admin/bank', 'refresh');
        }
    }

    public function edit($id_bank)
    {

        $data['bank'] = $this->Bank_model->showBankOne($id_bank);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'required|trim');
        $this->form_validation->set_rules('no_rekening', 'no_rekening', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati| Edit bank';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/bank/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Bank_model->ubahBank();
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
            redirect('admin/bank', 'refresh');
        }
    }

    public function hapus($id_bank)
    {
        if ($this->Bank_model->hapusBank($id_bank) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/bank');
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
            helper_log("hapus", "hapus bank");
            redirect('admin/bank', 'refresh');
        }
    }
}