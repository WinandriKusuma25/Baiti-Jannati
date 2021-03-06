<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/Jabatan_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Pengurus';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pengurus'] = $this->Pengurus_model->showPengurus();
        $data['pengurus_limit'] = $this->Pengurus_model->showPengurusLimit();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/pengurus/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama_pengurus', 'nama_pengurus', 'required|trim', [
            'required' => 'Nama pengurus tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim|min_length[9]', [
            'required' => 'No Telp tidak boleh kosong !',
            'min_length' => 'No Telp terlalu pendek'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'required|trim', [
            'required' => 'Jabatan tidak boleh kosong !',
        ]);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['pengurus'] = $this->Pengurus_model->showPengurus();
        $data['jabatan'] = $this->Jabatan_model->showJabatan();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati| Tambah Pengurus';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/pengurus/tambah', $data);
            $this->load->view('templates/superadmin/footer');
        } else {
            $this->load->model('admin/Pengurus_model');
            $this->Pengurus_model->tambahPengurus();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/pengurus', 'refresh');
        }
    }

    public function edit($id_pengurus)
    {

        $data['pengurus'] = $this->Pengurus_model->showPengurusOne($id_pengurus);
        $data['jabatan'] = $this->Jabatan_model->showJabatan();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('id_pengurus', 'id pengurus', 'required|numeric');
        $this->form_validation->set_rules('nama_pengurus', 'nama_pengurus', 'required|trim', [
            'required' => 'Nama pengurus tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim|min_length[9]', [
            'required' => 'No Telp tidak boleh kosong !',
            'min_length' => 'No Telp terlalu pendek'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin tidak boleh kosong !',
        ]);
        $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'required|trim', [
            'required' => 'Jabatan tidak boleh kosong !',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati | Edit Pengurus';
            $this->load->view('templates/superadmin/header', $data);
            $this->load->view('templates/superadmin/sidebar', $data);
            $this->load->view('templates/superadmin/topbar', $data);
            $this->load->view('superadmin/pengurus/edit', $data);
            $this->load->view('templates/superadmin/footer');
        } else {
            $this->Pengurus_model->ubahPengurus();
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
            redirect('superadmin/pengurus', 'refresh');
        }
    }

    public function hapus($id_pengurus)
    {
        if ($this->Pengurus_model->hapuspengurus($id_pengurus) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/pengurus');
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
            redirect('superadmin/pengurus', 'refresh');
        }
    }

    public function excel()
    {
        $data['pengurus'] = $this->Pengurus_model->showPengurus();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();


        $object->getProperties()->setCreator("Baiti jannati");
        $object->getProperties()->setLastModifiedBy("Baiti jannati");
        $object->getProperties()->setTitle("Baiti jannati");

        //CELL SIZE
        $object->getActiveSheet()->getColumnDimension('A')->setWidth('10');
        $object->getActiveSheet()->getColumnDimension('B')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('C')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('D')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('E')->setWidth('35');


        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'Data Pengurus Baiti Jannati');
        $object->getActiveSheet()->setCellValue('A3', 'No');
        $object->getActiveSheet()->setCellValue('B3', 'Nama Pengurus');
        $object->getActiveSheet()->setCellValue('C4', 'Jenis Kelamin');
        $object->getActiveSheet()->setCellValue('D4', 'Jabatan');
        $object->getActiveSheet()->setCellValue('E4', 'No. Telepon');

        $baris = 2;
        $no = 1;

        foreach ($data['pengurus'] as $pn) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $pn->nama_pengurus);
            $object->getActiveSheet()->setCellValue('C' . $baris, $pn->jenis_kelamin);
            $object->getActiveSheet()->setCellValue('D' . $baris, $pn->jabatan);
            $object->getActiveSheet()->setCellValue('E' . $baris, $pn->no_telp);

            $baris++;
        }
        // $spreadsheet->setActiveSheetIndex(0);
        ob_clean();
        $filename = "Data Pengurus Baiti Jannati" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Peminjaman");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function pdf()
    {
        $data['pengurus'] = $this->Pengurus_model->showPengurus();
        $this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Pengurus Baiti jannati.pdf"; 
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->load_view('superadmin/pengurus/laporan_pdf', $data);	
    }
}