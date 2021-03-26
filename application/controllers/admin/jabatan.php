<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jabatan extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/jabatan_model');
        $this->load->model('admin/user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Jabatan';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['jabatan'] = $this->jabatan_model->showJabatan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jabatan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
            'required' => 'Jabatan tidak boleh kosong !',
        ]);
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['jabatan'] = $this->jabatan_model->showJabatan();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Data jabatan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/jabatan/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('admin/jabatan_model');
            $this->jabatan_model->tambahJabatan();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/jabatan', 'refresh');
        }
    }

    public function edit($id_jabatan)
    {

        $data['jabatan'] = $this->jabatan_model->showJabatanOne($id_jabatan);
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati| Edit Jabatan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/jabatan/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->jabatan_model->ubahJabatan();
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
            redirect('admin/jabatan', 'refresh');
        }
    }

    public function hapus($id_jabatan)
    {
        if ($this->jabatan_model->hapusJabatan($id_jabatan) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/jabatan');
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
            redirect('admin/jabatan', 'refresh');
        }
    }
}