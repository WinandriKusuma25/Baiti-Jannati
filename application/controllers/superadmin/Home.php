<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/M_log');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['log'] = $this->M_log->getAll();
        $this->load->view('templates/superadmin/header', $data);
        $this->load->view('templates/superadmin/sidebar', $data);
        $this->load->view('templates/superadmin/topbar', $data);
        $this->load->view('superadmin/home/index', $data);
        $this->load->view('templates/superadmin/footer');
    }

    public function hapus($log_id)
    {
        if ($this->M_log->hapusLog($log_id) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('superadmin/home');
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
            redirect('superadmin/home', 'refresh');
        }
    }

    public function excel()
    {
        $data['log'] = $this->M_log->getAll();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Baiti jannati");
        $object->getProperties()->setLastModifiedBy("Baiti jannati");
        $object->getProperties()->setTitle("Baiti jannati");

        $object->setActiveSheetIndex(0);

        //CELL SIZE
        $object->getActiveSheet()->getColumnDimension('A')->setWidth('10');
        $object->getActiveSheet()->getColumnDimension('B')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('C')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('D')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('E')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('D')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('E')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('F')->setWidth('35');
        $object->getActiveSheet()->getColumnDimension('G')->setWidth('35');
      

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Log Waktu');
        $object->getActiveSheet()->setCellValue('C1', 'Log Pengurus');
        $object->getActiveSheet()->setCellValue('D1', 'Log Tipe');
        $object->getActiveSheet()->setCellValue('E1', 'Log Deskripsi');
       
        $baris = 2;
        $no = 1;

        foreach ($data['log'] as $ad) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $ad->log_time);
            $object->getActiveSheet()->setCellValue('C' . $baris, $ad->log_user);
            $object->getActiveSheet()->setCellValue('D' . $baris, $ad->log_tipe);
            $object->getActiveSheet()->setCellValue('E' . $baris, $ad->log_desc);
            $baris++;
        }
        // $spreadsheet->setActiveSheetIndex(0);
        ob_clean();
        $filename = "Data Log Aktivitas Pengurus Baiti Jannati" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Log Aktivitas Pengurus");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function database()
    {
        $this->load->dbutil();
        $db_format=array('format'=>'zip','filename'=>'BaitiJannati_backup.sql');
        $backup=& $this->dbutil->backup($db_format);
        $dbname='DB_BaitiJannati_backup'.date('d-m-Y').'.zip';
        $save='assets/backup_database/'.$dbname;
        write_file($save,$backup);
        force_download($dbname,$backup);
    }
}