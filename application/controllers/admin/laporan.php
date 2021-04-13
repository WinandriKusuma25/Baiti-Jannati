<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/User_model');
        $this->load->model('admin/Midtrans_model');
        $this->load->model('admin/Transaksitunai_model');
        $this->load->model('admin/Pengeluarandonasi_model');
        $this->load->model('admin/Laporan_model', 'laporan');
        is_logged_in();
    }

    public function index()
    {

        $this->form_validation->set_rules('transaksi', 'Transaksi', 'required|in_list[donasi_keuangan,pengeluaran_donasi]');
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Laporan';
            $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
            $data['pengeluaran_donasi'] = $this->Pengeluarandonasi_model->showPengeluaranDonasi();
            $data['transaksi_midtrans'] = $this->Midtrans_model->showTransaksiMidtransAll();
            $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunai();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/laporan/index', $data);
            $this->load->view('templates/footer_laporan');
        } else {
            $input = $this->input->post(null, true);
            $table = $input['transaksi'];
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $query = '';
            if ($table == 'pengeluaran_donasi') {
                $query = $this->laporan->getPengeluaranDonasi(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            } else {
                $query = $this->laporan->getPengeluaranDonasi(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            }

            $this->_cetak($query, $table, $tanggal);
        }
    }

    private function _cetak($data, $table_, $tanggal)
    {
        $this->load->library('CustomPDF');
        $table = $table_ == 'pengeluaran_donasi' ? 'Pengeluaran Donasi' : 'Donasi Keuangan';

        $pdf = new FPDF();
        $pdf->AddPage('L', 'Legal');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(190, 7, 'Laporan ' . $table, 0, 1, 'C');
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(190, 4, 'Tanggal : ' . $tanggal, 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);

        if ($table_ == 'pengeluaran_donasi') :
            // $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            // $pdf->Cell(25, 7, 'Nama', 1, 0, 'C');
            // $pdf->Cell(35, 7, 'Penerima', 1, 0, 'C');
            // $pdf->Cell(55, 7, 'Tgl.Donasi', 1, 0, 'C');
            // $pdf->Cell(40, 7, 'Jenis Donasi', 1, 0, 'C');
            // $pdf->Cell(30, 7, 'Jumlah', 1, 0, 'C');
            // $pdf->Cell(45, 7, 'Jumlah', 1, 0, 'C');
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Penanggung Jawab', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Tgl.Donasi', 1, 0, 'C');
            $pdf->Cell(95, 7, 'Nominal', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Keterangan', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                // $pdf->SetFont('Arial', '', 10);
                // $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                // $pdf->Cell(25, 7, $d['nama'], 1, 0, 'C');
                // $pdf->Cell(35, 7, $d['nama_pengurus'], 1, 0, 'C');
                // $pdf->Cell(55, 7, $d['tgl_donasi'], 1, 0, 'L');
                // $pdf->Cell(40, 7, $d['jenis_donasi'], 1, 0, 'L');
                // $pdf->Cell(30, 7, $d['jumlah'] . ' ' . $d['satuan'], 1, 0, 'C');
                // $pdf->Ln();
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(25, 7, $d['nama_pengurus'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['tgl_donasi'], 1, 0, 'C');
                $pdf->Cell(95, 7, $d['nominal'], 1, 0, 'L');
                $pdf->Cell(95, 7, $d['keterangan'], 1, 0, 'L');
                $pdf->Ln();
            }
        else :
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Penanggung Jawab', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Tgl.Pengeluaran', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Nominal', 1, 0, 'C');
            $pdf->Cell(70, 7, 'Keterangan', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(35, 7, $d['nama_pengurus'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['tgl_pengeluaran'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['nominal'], 1, 0, 'L');
                $pdf->Cell(70, 7, $d['keterangan'], 1, 0, 'L');
                $pdf->Ln();
            }
        endif;

        $file_name = $table . ' ' . $tanggal;
        $pdf->Output('I', $file_name);
    }
}