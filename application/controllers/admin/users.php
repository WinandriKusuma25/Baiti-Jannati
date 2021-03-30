<?php
defined('BASEPATH') or exit('No direct script access allowed');

class users extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/user_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Donatur';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['users'] = $this->user_model->tampilUserSaja();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/users/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id_user)
    {
        $data['title'] = 'Baiti Jannati | Detail Donatur';
        $data['users'] = $this->db->get_where('user', ['id_user' => $id_user])->result();
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/users/detail', $data);
        $this->load->view('templates/footer', $data);
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
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['users'] = $this->user_model->showUser();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Data Doantur';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/users/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('admin/user_model');
            $this->user_model->tambahUser();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/users', 'refresh');
        }
    }

    public function edit($id_user)
    {

        $data['users'] = $this->db->get_where('user', ['id_user' => $id_user])->result();
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('id_user', 'id_user', 'required|numeric');
        $this->form_validation->set_rules('is_active', 'is_active', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Kominfo Batu | Edit Status User';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/users/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->user_model->ubahUser();
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
            redirect('admin/users', 'refresh');
        }
    }
}