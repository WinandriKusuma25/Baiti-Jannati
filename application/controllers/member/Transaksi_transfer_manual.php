<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_transfer_manual extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Bank_model');
        $this->load->model('admin/Transaksitransfermanual_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Transfer Manual';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->showTransaksiTransferUser($this->session->userdata('email'));
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/transaksi_transfer_manual/index', $data);
        $this->load->view('templates/member/footer');
    }

    public function detail($id_transfer)
    {
        $data['title'] = 'Baiti Jannati | Detail Riwayat Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['transaksi_transfer'] = $this->Transaksitransfermanual_model->getTransaksiTransferManualDetail($id_transfer);
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/transaksi_transfer_manual/detail', $data);
        $this->load->view('templates/member/footer');
    }

    public function hapus($id_transfer)
    {
        if ($this->Transaksitransfermanual_model->hapus($id_transfer) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('member/transaksi_transfer_manual');
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
            redirect('member/transaksi_transfer_manual');
        }
    }

    public function edit($id_transfer)
    {
        $data['title'] = 'Baiti Jannati | Edit Transaksi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['bank_transfer'] = $this->Transaksitransfermanual_model->getTransaksi($id_transfer);
        $data['bank'] = $this->Bank_model->showBank();
        // $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        $this->form_validation->set_rules('nominal', 'nominal', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/member/header', $data);
            $this->load->view('templates/member/sidebar', $data);
            $this->load->view('templates/member/topbar', $data);
            $this->load->view('member/transaksi_transfer_manual/edit', $data);
            $this->load->view('templates/member/footer');
        } else {

            //check jika ada gambar yang akan di upload
            $upload_image = $_FILES['bukti']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048; //2mb
                $config['upload_path']          = './assets/images/bukti';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('bukti')) {
                    $old_image = $data['bank_transfer']['bukti'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/images/bukti/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('bukti', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id_transfer = $this->input->post('id_transfer');
            $bank = $this->input->post('bank');
            $norekening = $this->input->post('norekening');
            $id_bank = $this->input->post('id_bank');
            $nominal = $this->input->post('nominal');
            $keterangan = $this->input->post('keterangan');

            $this->db->set('bank', $bank);
            $this->db->set('norekening', $norekening);
            $this->db->set('id_bank', $id_bank);
            $this->db->set('nominal', $nominal);
            $this->db->set('keterangan', $keterangan);
            $this->db->where('id_transfer', $id_transfer);
            $this->db->update('bank_transfer');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('member/transaksi_transfer_manual');
        }
    }

}