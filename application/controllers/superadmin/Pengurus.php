<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Pengurus';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pengurus'] = $this->User_model->tampilPengurusSaja();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pengurus/index', $data);
        $this->load->view('templates/superadmin/footer', $data);
    }

    public function detail($id_user)
    {
        $data['title'] = 'Baiti Jannati | Detail Donatur';
        $data['pengurus'] = $this->db->get_where('user', ['id_user' => $id_user])->result();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pengurus/detail', $data);
        $this->load->view('templates/superadmin/footer', $data);
    }


    public function tambah()
    {

        $this->form_validation->set_rules('name', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah digunakan !',
            'required' => 'Email tidak boleh kosong !',
            'valid_email' => "Email tidak valid !"
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Konfirmasi Password tidak sama !',
            'required' => 'Password tidak boleh kosong !',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'matches' => 'Konfirmasi Password tidak sama !',
            'required' => 'Password tidak boleh kosong !',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pengurus'] = $this->User_model->showUser();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Data Doantur';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/pengurus/tambah', $data);
            $this->load->view('templates/superadmin/footer', $data);
        } else {
            $this->load->model('superadmin/User_model');
            $this->User_model->tambahPengurus();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/pengurus', 'refresh');
        }
    }

    public function edit($id_user)
    {

        $data['pengurus'] = $this->db->get_where('user', ['id_user' => $id_user])->result();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('id_user', 'id_user', 'required|numeric');
        $this->form_validation->set_rules('is_active', 'is_active', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Kominfo Batu | Edit Status User';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/pengurus/edit', $data);
            $this->load->view('templates/superadmin/footer', $data);
        } else {
            $this->User_model->ubahUser();
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
            redirect('superadmin/pengurus', 'refresh');
        }
    }
}