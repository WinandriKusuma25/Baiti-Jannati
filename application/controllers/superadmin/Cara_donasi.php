<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cara_donasi extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Caradonasi_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Cara Donasi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['cara_donasi'] = $this->Caradonasi_model->showCaraDonasi();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/cara_donasi/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required|trim', [
            'required' => 'Pertanyaan tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('jawaban', 'jawaban', 'required|trim', [
            'required' => 'Jawaban tidak boleh kosong !',
        ]);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['cara_donasi'] = $this->Caradonasi_model->showCaraDonasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Data Cara Berdonasi';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/cara_donasi/tambah', $data);
            $this->load->view('templates/superadmin/footer');
        } else {
            $this->load->model('admin/Caradonasi_model');
            $this->Caradonasi_model->tambahCaraDonasi();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/cara_donasi', 'refresh');
        }
    }

    public function edit($id_cara)
    {

        $data['cara_donasi'] = $this->Caradonasi_model->showCaraDonasiOne($id_cara);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required|trim', [
            'required' => 'Pertanyaan tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('jawaban', 'jawaban', 'required|trim', [
            'required' => 'Jawaban tidak boleh kosong !',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati | Edit Cara Berdonasi';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/cara_donasi/edit', $data);
            $this->load->view('templates/superadmin/footer');
        } else {
            $this->Caradonasi_model->ubahCaraDonasi();
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
            redirect('superadmin/cara_donasi', 'refresh');
        }
    }

    public function hapus($id_cara)
    {
        if ($this->Caradonasi_model->hapusCaraDonasi($id_cara) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/cara_donasi');
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
            redirect('superadmin/cara_donasi', 'refresh');
        }
    }
}