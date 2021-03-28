<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengeluaran_donasi extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/pengeluarandonasi_model');
        $this->load->model('admin/pengurus_model');
        $this->load->model('admin/user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = 'Baiti Jannati | Pengeluaran Donasi';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['pengeluaran_donasi'] = $this->pengeluarandonasi_model->showPengeluaranDonasi();
        $data['pengeluaran_donasi_hari'] = $this->pengeluarandonasi_model->countHari();
        $data['pengeluaran_donasi_bulan'] = $this->pengeluarandonasi_model->countBulan();
        $data['pengeluaran_donasi_tahun'] = $this->pengeluarandonasi_model->countTahun();
        $data['nominal_hari'] = $this->pengeluarandonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->pengeluarandonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->pengeluarandonasi_model->nominalTahun();
        $data['nominal_all'] = $this->pengeluarandonasi_model->nominalAll();
        // var_dump($data);
        // die();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengeluaran_donasi/index', $data);
        $this->load->view('templates/footer');
    }


    public function filter()
    {
        $this->form_validation->set_rules('startdate', 'startdate', 'required|trim');
        $this->form_validation->set_rules('enddate', 'enddate', 'required|trim');
        $startdate = $this->input->get('startdate', TRUE);
        $enddate = $this->input->get('enddate', TRUE);
        // die($startdate . "===" . $enddate);
        $data['title'] = 'Baiti Jannati | Pengeluaran Donasi ';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        // $data['nominal_terbesar'] = $this->pengeluarandonasi_model->nominalTerbesar();
        $data['pengeluaran_donasi'] = $this->pengeluarandonasi_model->showPengeluaranDonasiFilter(array($startdate, $enddate));
        $data['pengeluaran_donasi_hari'] = $this->pengeluarandonasi_model->countHari();
        $data['pengeluaran_donasi_bulan'] = $this->pengeluarandonasi_model->countBulan();
        $data['pengeluaran_donasi_tahun'] = $this->pengeluarandonasi_model->countTahun();
        $data['nominal_hari'] = $this->pengeluarandonasi_model->nominalHari();
        $data['nominal_bulan'] = $this->pengeluarandonasi_model->nominalBulan();
        $data['nominal_tahun'] = $this->pengeluarandonasi_model->nominalTahun();
        $data['nominal_all'] = $this->pengeluarandonasi_model->nominalAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengeluaran_donasi/index', $data);
        $this->load->view('templates/footer');
    }


    public function tambah()
    {


        $this->form_validation->set_rules('nominal', 'nominal', 'required|trim', [
            'required' => 'Nominal tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('tgl_pengeluaran', 'tgl_pengeluaran', 'required|trim', [
            'required' => 'Tanggal Pengeluaran tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('id_pengurus', 'id_pengurus', 'required|trim', [
            'required' => 'Pengurus tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim', [
            'required' => 'Keterangan tidak boleh kosong !',
        ]);
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['pengurus'] = $this->pengurus_model->showPengurus();
        $data['pengeluaran_donasi'] = $this->pengeluarandonasi_model->showPengeluaranDonasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati| Tambah Pengeluaran Donasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pengeluaran_donasi/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('admin/pengeluarandonasi_model');
            $this->pengeluarandonasi_model->tambahPengeluaranDonasi();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/pengeluaran_donasi', 'refresh');
        }
    }

    public function edit($id_pengeluaran)
    {

        $data['pengeluaran_donasi'] = $this->pengeluarandonasi_model->getPengeluaranDonasi($id_pengeluaran);
        $data['pengurus'] = $this->pengurus_model->showPengurus();
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('nominal', 'nominal', 'required|trim', [
            'required' => 'Nominal tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('tgl_pengeluaran', 'tgl_pengeluaran', 'required|trim', [
            'required' => 'Tanggal Pengeluaran tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('id_pengurus', 'id_pengurus', 'required|trim', [
            'required' => 'Pengurus tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim', [
            'required' => 'Keterangan tidak boleh kosong !',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati | Edit Pengeluaran Donasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pengeluaran_donasi/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->pengeluarandonasi_model->ubahPengeluaranDonasi();
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
            redirect('admin/pengeluaran_donasi', 'refresh');
        }
    }

    public function hapus($id_pengeluaran)
    {
        if ($this->pengeluarandonasi_model->hapusPengeluaranDonasi($id_pengeluaran) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/pengeluaran_donasi');
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
            redirect('admin/pengeluaran_donasi', 'refresh');
        }
    }

    public function detail($id_pengeluaran)
    {
        $data['title'] = 'Baiti Jannati | Detail Pengeluaran Donasi';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['pengeluaran_donasi'] = $this->pengeluarandonasi_model->getPengeluaranDonasi($id_pengeluaran);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengeluaran_donasi/detail', $data);
        $this->load->view('templates/footer', $data);
    }
}