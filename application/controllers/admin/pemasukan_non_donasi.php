<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan_non_donasi extends CI_Controller
{
    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Pemasukannondonasi_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Pemasukan Non Donasi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->showPemasukanNonDonasi();
        $data['pemasukan_non_donasi_hari'] = $this->Pemasukannondonasi_model->countHari();
        $data['pemasukan_non_donasi_bulan'] = $this->Pemasukannondonasi_model->countBulan();
        $data['pemasukan_non_donasi_tahun'] = $this->Pemasukannondonasi_model->countTahun();
        $data['nominal_hari'] = $this->Pemasukannondonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->Pemasukannondonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->Pemasukannondonasi_model->nominalTahun();
        $data['nominal_all'] = $this->Pemasukannondonasi_model->nominalAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pemasukan_non_donasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function filter()
    {

        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Pemasukan Non Donasi ';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->filter();
        // $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->showPemasukanNonDonasi();
        $data['pemasukan_non_donasi_hari'] = $this->Pemasukannondonasi_model->countHari();
        $data['pemasukan_non_donasi_bulan'] = $this->Pemasukannondonasi_model->countBulan();
        $data['pemasukan_non_donasi_tahun'] = $this->Pemasukannondonasi_model->countTahun();
        $data['nominal_hari'] = $this->Pemasukannondonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->Pemasukannondonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->Pemasukannondonasi_model->nominalTahun();
        $data['nominal_all'] = $this->Pemasukannondonasi_model->nominalAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pemasukan_non_donasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {


        $this->form_validation->set_rules('nominal', 'nominal', 'required|trim', [
            'required' => 'Nominal tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim', [
            'required' => 'Keterangan tidak boleh kosong !',
        ]);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->showPemasukanNonDonasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati| Tambah Pemasukan Non Donasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pemasukan_non_donasi/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('admin/Pemasukannondonasi_model');
            $this->Pemasukannondonasi_model->tambahPemasukanNonDonasi();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            helper_log("tambah", "tambah pemasukan non donasi");
            redirect('admin/pemasukan_non_donasi', 'refresh');
        }
    }

    public function edit($id_pemasukan)
    {

        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->getPemasukanNonDonasi($id_pemasukan);
        $data['pengurus'] = $this->Pengurus_model->showPengurus();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('nominal', 'nominal', 'required|trim', [
            'required' => 'Nominal tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim', [
            'required' => 'Keterangan tidak boleh kosong !',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati | Edit Pemasukan Donasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pemasukan_non_donasi/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Pemasukannondonasi_model->ubahPemasukanNonDonasi();
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
            helper_log("edit", "edit pemasukan non donasi");
            redirect('admin/pemasukan_non_donasi', 'refresh');
        }
    }

    public function hapus($id_pemasukan)
    {
        if ($this->Pemasukannondonasi_model->hapusPemasukanNonDonasi($id_pemasukan) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/pemasukan_non_donasi');
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
            helper_log("hapus", "hapus pemasukan non donasi");
            redirect('admin/pemasukan_non_donasi', 'refresh');
        }
    }

    public function detail($id_pemasukan)
    {
        $data['title'] = 'Baiti Jannati | Detail Pemasukan Non Donasi';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->Pemasukannondonasi_model->getPemasukanNonDonasi($id_pemasukan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pemasukan_non_donasi/detail', $data);
        $this->load->view('templates/footer', $data);
    }
}