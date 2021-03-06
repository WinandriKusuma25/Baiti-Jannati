<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'valid_email' => 'Email harus valid !',
            'required' => 'Email tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong !',
        ]);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Login';
            $this->load->view('template/header', $data);
            // $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
            $this->load->view('template/footer');

        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika user nya ada
        if ($user) {
            //jika user nya atif
            if ($user['is_active'] == 'aktif') {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role' => $user['role'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role'] == 'pengurus') {
                        // helper_log("login", "telah melakukan login");
                        redirect('admin/home');
                    }else if ($user['role'] == 'admin') {
                        // helper_log("login", "telah melakukan login");
                        redirect('superadmin/home');
                    }else{
                        redirect('member/home');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                           Password Salah !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Email belum di aktivasi !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Email Belum Registrasi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('auth');
        }
    }

    public function registration()
    {
        // $this->form_validation->set_rules('name', 'Name', 'required|trim');
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
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Registrasi';
            $this->load->view('template/header', $data);
            // $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            // $this->load->view('templates/auth_footer');
            $this->load->view('template/footer', $data);
   
        } else {
            $email = $this->input->post('email', true);
            $data = [
                // 'name' => htmlspecialchars($this->input->post('name', true)),
                'name' => 'Hamba Allah',
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' =>  'donatur',
                'is_active' => 'pasif',
                'date_created' => time()
            ];

            //siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()

            ];
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Akunmu telah berhasil dibuat, Segera aktifkan akunmu.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.gmail.com',
        //     'smtp_user' => 'angkasasemesta12@gmail.com',
        //     'smtp_pass' => 'bintangbulan12',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n",
        //     'useragent' => 'Codeigniter',
        //     'crlf'=>"\r\n",
        //     'wordwrap'=>TRUE,
        // ];
        
        $config = array();
		$config['charset']='utf-8';
		$config['useragent']='Codeigniter';
		$config['protocol']="smtp";
		$config['mailtype']="html";
		$config['smtp_host']="ssl://smtp.gmail.com";
		$config['smtp_port']="465";
		$config['smtp_timeout']="400";
		$config['smtp_user']="yayasantesting@gmail.com";
		$config['smtp_pass']="yayasantesting12";
		$config['crlf']="\r\n";
		$config['newline']="\r\n";
		$config['wordwrap']=TRUE;

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('yayasantesting@gamil.com', 'Yayasan Baiti Jannati');
        $this->email->to($this->input->post('email'));

        if ($type  == 'verify') {
            $this->email->subject('Account verification');
            $this->email->message('Klik untuk memverikasi akunmu: <a href="'
                . base_url() . 'auth/verify?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '">Active</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link untuk reset password : <a href="'
                . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token =  $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat!</strong> ' . $email . ' telah aktif silahkan login!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       Token Kadarluarsa!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Aktivasi Akun Gagal! Token Invalid!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akun aktivasi gagal ! Email Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        date_default_timezone_set("ASIA/JAKARTA");
        $date = array('last_login' => date('Y-m-d H:i:s'));
        $id = $this->session->userdata('id_user');
        $this->User_model->logout($date, $id);
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        // $this->session->sess_destroy();

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Anda telah Logout !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        // helper_log("logout", "telah melakukan logout");
        redirect('auth');
    }

    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong !',
            'valid_email' => 'Email harus valid !',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Lupa Password';
            $this->load->view('template/header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('template/footer', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()

                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Silahkan cek email Anda untuk mereset password !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('auth/forgotPassword');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Email belum registrasi atau email belum aktif !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token =  $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       Reset password gagal ! token salah
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                );
                redirect('auth/forgotPassword');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Reset password gagal! Email salah
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
            );
            redirect('auth/forgotPassword');
        }
    }

    public function changePassword()

    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Reset Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change_password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Password telah diubah. Silahkan login !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
            );
            redirect('auth');
        }
    }
}