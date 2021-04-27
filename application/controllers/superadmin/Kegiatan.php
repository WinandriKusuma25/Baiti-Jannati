<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Kegiatan_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['kegiatan'] = $this->Kegiatan_model->showkegiatan();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/kegiatan/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function edit($id_kegiatan)
    {
        $data['title'] = 'Baiti Jannati | Edit Kegiatan ';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['kegiatan'] = $this->Kegiatan_model->getkegiatan($id_kegiatan);
        $this->form_validation->set_rules('judul', 'judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');
   
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/kegiatan/edit', $data);
            $this->load->view('templates/superadmin/footer');
        } else {

            //check jika ada gambar yang akan di upload
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048; //2mb
                $config['upload_path']          = './assets/images/kegiatan';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['kegiatan']['foto'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/images/kegiatan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id_kegiatan = $this->input->post('id_kegiatan');
            $judul = $this->input->post('judul');
            $deskripsi = $this->input->post('deskripsi');
            $this->db->set('judul', $judul);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->update('kegiatan');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('superadmin/kegiatan');
        }
    }

    public function tambah()
    {
        $data['title'] = 'Baiti Jannati | Tambah Profil';
        $this->form_validation->set_rules('judul', 'judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');
        $data['user'] = $this->User_model->getUser($this->session->userdata('id_user'));
        $data['kegiatan'] = $this->Kegiatan_model->showkegiatan();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/kegiatan/tambah', $data);
            $this->load->view('templates/superadmin/footer');
        } else {
            $upload = $this->Kegiatan_model->upload();
            if ($upload['result'] == 'success') {
                $this->Kegiatan_model->addkegiatan($upload);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data berhasil di tambahkan ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('superadmin/kegiatan');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function detail($id_kegiatan)
    {
        $data['title'] = 'Baiti Jannati | Detail kegiatan';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['kegiatan'] = $this->kegiatan_model->getkegiatan($id_kegiatan);
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/kegiatan/detail', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function hapus($id_kegiatan)
    {
        $this->Kegiatan_model->hapuskegiatan($id_kegiatan);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data berhasil di hapus !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        );
        redirect('superadmin/kegiatan', 'refresh');
    }
}