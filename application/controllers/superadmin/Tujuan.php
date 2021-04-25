<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tujuan extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Tujuan_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Tujuan';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['tujuan'] = $this->Tujuan_model->showtujuan();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/tujuan/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('judul', 'judul', 'required|trim', [
            'required' => 'tujuan tidak boleh kosong !',
        ]);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['tujuan'] = $this->Tujuan_model->showtujuan();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Data tujuan';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/tujuan/tambah', $data);
            $this->load->view('templates/superadmin/footer');
        } else {
            $this->load->model('admin/Tujuan_model');
            $this->Tujuan_model->tambahtujuan();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/tujuan', 'refresh');
        }
    }

    public function edit($id_tujuan)
    {

        $data['tujuan'] = $this->Tujuan_model->showtujuanOne($id_tujuan);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('judul', 'judul', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati | Edit tujuan';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/tujuan/edit', $data);
            $this->load->view('templates/superadmin/footer');
        } else {
            $this->Tujuan_model->ubahtujuan();
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
            redirect('superadmin/Tujuan', 'refresh');
        }
    }

    public function hapus($id_tujuan)
    {
        if ($this->Tujuan_model->hapustujuan($id_tujuan) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/tujuan');
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
            redirect('superadmin/tujuan', 'refresh');
        }
    }
}