<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Kategori_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | kategori';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['kategori'] = $this->Kategori_model->showkategori();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required|trim', [
            'required' => 'kategori tidak boleh kosong !',
        ]);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['kategori'] = $this->Kategori_model->showKategori();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Data kategori';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kategori/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('admin/kategori_model');
            $this->Kategori_model->tambahKategori();
         
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            helper_log("add", "tambah kategori");
            redirect('admin/kategori', 'refresh');
        }
    }

    public function edit($id_kategori)
    {

        $data['kategori'] = $this->Kategori_model->showKategoriOne($id_kategori);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati| Edit kategori';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kategori/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kategori_model->ubahkategori();
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
            redirect('admin/kategori', 'refresh');
        }
    }

    public function hapus($id_kategori)
    {
        if ($this->Kategori_model->hapusKategori($id_kategori) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/kategori');
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
            helper_log("delete", "hapus kategori");
            redirect('admin/kategori', 'refresh');
        }
    }
}