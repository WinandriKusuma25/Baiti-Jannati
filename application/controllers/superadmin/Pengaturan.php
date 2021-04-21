<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Pengaturan_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Pengaturan Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['pengaturan'] = $this->Pengaturan_model->showPengaturan();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pengaturan/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function edit($id_pengaturan)
    {
        $data['title'] = 'Baiti Jannati | Edit Pengaturan ';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturan($id_pengaturan);
        // $data['pengaturan'] = $this->Pengaturan_model->showPengaturan();
        $this->form_validation->set_rules('sejarah', 'sejarah', 'required|trim');
        $this->form_validation->set_rules('kondisi', 'kondisi', 'required|trim');
        // $this->form_validation->set_rules('foto', 'foto', 'required|trim');
 

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/pengaturan/edit', $data);
            $this->load->view('templates/superadmin/footer');
        } else {

            //check jika ada gambar yang akan di upload
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048; //2mb
                $config['upload_path']          = './assets/images/pengaturan';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['pengaturan']['foto'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/images/pengaturan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id_pengaturan = $this->input->post('id_pengaturan');
            $sejarah = $this->input->post('sejarah');
            $kondisi = $this->input->post('kondisi');
            // var_dump($kondisi);
            // die();
       
            $this->db->set('sejarah', $sejarah);
            $this->db->set('kondisi', $kondisi);
            $this->db->where('id_pengaturan', $id_pengaturan);
            $this->db->update('pengaturan');



            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('superadmin/pengaturan');
        }
    }
}