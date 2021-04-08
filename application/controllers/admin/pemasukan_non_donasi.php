<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemasukan_non_donasi extends CI_Controller
{
    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/pemasukannondonasi_model');
        $this->load->model('admin/pengurus_model');
        $this->load->model('admin/user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Pemasukan Non Donasi';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->pemasukannondonasi_model->showPemasukanNonDonasi();
        $data['pemasukan_non_donasi_hari'] = $this->pemasukannondonasi_model->countHari();
        $data['pemasukan_non_donasi_bulan'] = $this->pemasukannondonasi_model->countBulan();
        $data['pemasukan_non_donasi_tahun'] = $this->pemasukannondonasi_model->countTahun();
        $data['nominal_hari'] = $this->pemasukannondonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->pemasukannondonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->pemasukannondonasi_model->nominalTahun();
        $data['nominal_all'] = $this->pemasukannondonasi_model->nominalAll();
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
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->pemasukannondonasi_model->filter();
        // $data['pemasukan_non_donasi'] = $this->pemasukannondonasi_model->showPemasukanNonDonasi();
        $data['pemasukan_non_donasi_hari'] = $this->pemasukannondonasi_model->countHari();
        $data['pemasukan_non_donasi_bulan'] = $this->pemasukannondonasi_model->countBulan();
        $data['pemasukan_non_donasi_tahun'] = $this->pemasukannondonasi_model->countTahun();
        $data['nominal_hari'] = $this->pemasukannondonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->pemasukannondonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->pemasukannondonasi_model->nominalTahun();
        $data['nominal_all'] = $this->pemasukannondonasi_model->nominalAll();
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
        $this->form_validation->set_rules('tgl_pemasukan', 'tgl_pemasukan', 'required|trim', [
            'required' => 'Tanggal Pemasukan tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('id_pengurus', 'id_pengurus', 'required|trim', [
            'required' => 'Pengurus tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim', [
            'required' => 'Keterangan tidak boleh kosong !',
        ]);
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['pengurus'] = $this->pengurus_model->showPengurus();
        $data['pemasukan_non_donasi'] = $this->pemasukannondonasi_model->showPemasukanNonDonasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati| Tambah Pemasukan Non Donasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pemasukan_non_donasi/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('admin/pemasukannondonasi_model');
            $this->pemasukannondonasi_model->tambahPemasukanNonDonasi();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/pemasukan_non_donasi', 'refresh');
        }
    }

    public function edit($id_pemasukan)
    {

        $data['pemasukan_non_donasi'] = $this->pemasukannondonasi_model->getPemasukanNonDonasi($id_pemasukan);
        $data['pengurus'] = $this->pengurus_model->showPengurus();
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('nominal', 'nominal', 'required|trim', [
            'required' => 'Nominal tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('tgl_pemasukan', 'tgl_pemasukan', 'required|trim', [
            'required' => 'Tanggal Pemasukan tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('id_pengurus', 'id_pengurus', 'required|trim', [
            'required' => 'Pengurus tidak boleh kosong !',
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
            $this->pemasukannondonasi_model->ubahPemasukanNonDonasi();
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
            redirect('admin/pemasukan_non_donasi', 'refresh');
        }
    }

    public function hapus($id_pemasukan)
    {
        if ($this->pemasukannondonasi_model->hapusPemasukanNonDonasi($id_pemasukan) == false) {
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
            redirect('admin/pemasukan_non_donasi', 'refresh');
        }
    }

    public function detail($id_pemasukan)
    {
        $data['title'] = 'Baiti Jannati | Detail Pemasukan Non Donasi';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['pemasukan_non_donasi'] = $this->pemasukannondonasi_model->getPemasukanNonDonasi($id_pemasukan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pemasukan_non_donasi/detail', $data);
        $this->load->view('templates/footer', $data);
    }
}