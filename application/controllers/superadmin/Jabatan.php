<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Jabatan_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Jabatan';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['jabatan'] = $this->Jabatan_model->showJabatan();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/jabatan/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
            'required' => 'Jabatan tidak boleh kosong !',
        ]);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['jabatan'] = $this->Jabatan_model->showJabatan();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Data jabatan';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/jabatan/tambah', $data);
            $this->load->view('templates/superadmin/footer');
        } else {
            $this->load->model('admin/Jabatan_model');
            $this->Jabatan_model->tambahJabatan();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/jabatan', 'refresh');
        }
    }

    public function edit($id_jabatan)
    {

        $data['jabatan'] = $this->Jabatan_model->showJabatanOne($id_jabatan);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati| Edit Jabatan';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/jabatan/edit', $data);
            $this->load->view('templates/superadmin/footer');
        } else {
            $this->Jabatan_model->ubahJabatan();
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
            redirect('superadmin/jabatan', 'refresh');
        }
    }

    public function hapus($id_jabatan)
    {
        if ($this->Jabatan_model->hapusJabatan($id_jabatan) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/jabatan');
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
            redirect('superadmin/jabatan', 'refresh');
        }
    }
}