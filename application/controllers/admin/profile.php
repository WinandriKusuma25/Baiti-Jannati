<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{
    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/user_model');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Profil';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footer_dark');
    }

    public function edit()
    {
        $data['title'] = 'Baiti Jannati | Edit Profil';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));

        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/profile/edit', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/footer_dark');
        } else {

            //check jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048; //2mb
                $config['upload_path']          = './assets/images/profile';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/images/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
             Profil Anda berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/profile');
        }
    }
}