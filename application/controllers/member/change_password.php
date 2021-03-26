<?php
defined('BASEPATH') or exit('No direct script access allowed');

class change_password extends CI_Controller
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
        $data['title'] = 'Baiti Jannati | Ubah Password';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/change_password/index', $data);
        $this->load->view('templates/member/footer');
    }

    public function changePassword()
    {
        $data['title'] = 'Baiti Jannati | Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', [
            'required' => 'Password sekarang tidak boleh kosong !',

        ]);
        $this->form_validation->set_rules('new_password1', 'New  Password', 'required|trim|min_length[4]|matches[new_password2]', [
            'required' => 'Password baru tidak boleh kosong !',
            'min_length' => 'Password terlalu pendek !',
            'matches' => 'Konfirmasi Password tidak sama !',
        ]);
        $this->form_validation->set_rules('new_password2', ' Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]', [
            'required' => 'Konfirmasi Password tidak boleh kosong !',
            'min_length' => 'Password terlalu pendek !',
            'matches' => 'Konfirmasi Password tidak sama !',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/member/header', $data);
            $this->load->view('templates/member/sidebar', $data);
            $this->load->view('templates/member/topbar_password', $data);
            $this->load->view('member/change_password/index', $data);
            $this->load->view('templates/member/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password =  $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Password lama salah !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('member/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Password lama tidak boleh dan password baru !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('member/change_password');
                } else {
                    //password sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                           Password Anda berhasil diubah ! 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('member/change_password');
                }
            }
        }
    }
}