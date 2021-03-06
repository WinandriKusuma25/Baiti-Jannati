<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Berita_model');
        $this->load->model('admin/User_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Berita';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['berita'] = $this->Berita_model->showBerita();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/berita/index', $data);
        $this->load->view('templates/superadmin/footer', $data);
    }

    public function tambah()
    {

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');
    

        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['berita'] = $this->Berita_model->showBerita();
        

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Berita';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/berita/tambah', $data);
            $this->load->view('templates/superadmin/footer', $data);
        } else {
            $upload = $this->Berita_model->upload();
            if ($upload['result'] == 'success') {
                $this->Berita_model->addBerita($upload);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data berhasil di tambahkan ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('superadmin/berita');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function detail($id_berita)
    {
        $data['title'] = 'Baiti Jannati | Detail Berita Kegiatan';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['berita'] = $this->Berita_model->getBerita($id_berita);
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/berita/detail', $data);
        $this->load->view('templates/superadmin/footer', $data);
      
    }

    public function edit($id_berita)
    {
        $data['title'] = 'Baiti Jannati | Edit Berita';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['berita'] = $this->Berita_model->getBerita($id_berita);
        // $this->form_validation->set_rules('tgl_kegiatan', 'tgl_kegiatan', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');
              $this->form_validation->set_rules('judul', 'judul', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);;
            $this->load->view('superadmin/berita/edit', $data);
            $this->load->view('templates/superadmin/footer', $data);
        } else {

            //check jika ada gambar yang akan di upload
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048; //2mb
                $config['upload_path']          = './assets/images/berita';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['berita']['foto'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/images/berita/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id_berita = $this->input->post('id_berita');
            $judul = $this->input->post('judul');
            $deskripsi = $this->input->post('deskripsi');

            $this->db->set('judul', $judul);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->where('id_berita', $id_berita);
            $this->db->update('berita');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('superadmin/berita');
        }
    }

    public function hapus($id_berita)
    {
        $this->Berita_model->deleteBerita($id_berita);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data berhasil di hapus !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        );
        redirect('superadmin/berita', 'refresh');
    }
}