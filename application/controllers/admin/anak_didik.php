<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak_Didik extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Anakdidik_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
        // $this->load->library('pdf');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Anak Didik';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['anak_didik'] = $this->Anakdidik_model->showAnakDidik();
        $data['anak_didik_limit'] = $this->Anakdidik_model->showAnakDidikLimit();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/anak_didik/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footer_dark');
    }


    public function tambah()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nama_wali', 'nama_wali', 'required|trim');
        // $this->form_validation->set_rules('foto', 'Foto', 'required|trim');
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['anak_didik'] = $this->Anakdidik_model->showAnakDidik();
        $data['pengurus'] = $this->Pengurus_model->showPengurus();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Anak Didik';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/anak_didik/tambah', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/footer_dark');
        } else {
            $upload = $this->Anakdidik_model->upload();
            if ($upload['result'] == 'success') {
                $this->Anakdidik_model->addAnakDidik($upload);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data berhasil di tambahkan ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('admin/Anak_Didik');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function hapus($id_anak_didik)
    {
        $this->Anakdidik_model->deleteAnakDidik($id_anak_didik);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   Data berhasil di hapus !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        );
        redirect('admin/Anak_Didik', 'refresh');
    }

    public function detail($id_anak_didik)
    {
        $data['title'] = 'Baiti Jannati | Detail Anak Didik';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['anak_didik'] = $this->Anakdidik_model->getAnakDidik($id_anak_didik);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/anak_didik/detail', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/footer_dark', $data);
    }

    public function excel()
    {
        $data['anak_didik'] = $this->Anakdidik_model->showAnakDidik();

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
        //  $object->getActiveSheet()->getColumnDimension('E')->setWidth('35');

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Nama');
        $object->getActiveSheet()->setCellValue('C1', 'Penanggung Jawab');
        $object->getActiveSheet()->setCellValue('D1', 'Jenis Kelamin');
        $object->getActiveSheet()->setCellValue('E1', 'TTL');
        $object->getActiveSheet()->setCellValue('F1', 'Alamat');
        $object->getActiveSheet()->setCellValue('G1', 'Nama Wali');
        // $object->getActiveSheet()->setCellValue('H1', 'Foto');

        $baris = 2;
        $no = 1;

        foreach ($data['anak_didik'] as $ad) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $ad->nama);
            $object->getActiveSheet()->setCellValue('C' . $baris, $ad->nama);
            $object->getActiveSheet()->setCellValue('D' . $baris, $ad->jenis_kelamin);
            $object->getActiveSheet()->setCellValue('E' . $baris, $ad->tempat_lahir);
            $object->getActiveSheet()->setCellValue('E' . $baris, $ad->tgl_lahir);
            $object->getActiveSheet()->setCellValue('F' . $baris, $ad->alamat);
            $object->getActiveSheet()->setCellValue('G' . $baris, $ad->nama_wali);

            // $objDrawing = new PHPExcel_Worksheet_Drawing();
            // $objDrawing->setName('Logo');
            // $objDrawing->setDescription('Logo');
            // // echo FCPATH . 'assets/images/anak_didik/' . $ad->foto;
            // // die;
            // $objDrawing->setPath(FCPATH . 'assets/images/anak_didik/' . $ad->foto);
            // $objDrawing->setCoordinates('H' . $baris);
            // $object->getActiveSheet()->setCellValue('H' . $baris, FCPATH . 'assets/images/anak_didik/' . $ad->foto);

            $baris++;
        }
        // $spreadsheet->setActiveSheetIndex(0);
        ob_clean();
        $filename = "Data Anak Didik Baiti Jannati" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Peminjaman");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function edit($id_anak_didik)
    {
        $data['title'] = 'Baiti Jannati | Edit Anak Didik';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['anak_didik'] = $this->Anakdidik_model->getAnakDidik($id_anak_didik);
        $data['pengurus'] = $this->Pengurus_model->showPengurus();
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        // $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim');
        // $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/anak_didik/edit', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/footer_dark');
        } else {

            //check jika ada gambar yang akan di upload
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048; //2mb
                $config['upload_path']          = './assets/images/anak_didik';
                $config['file_name']            = $this->input->post('nama');
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['anak_didik']['foto'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/images/anak_didik/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id_anak_didik = $this->input->post('id_anak_didik');
            $id_pengurus = $this->input->post('id_pengurus');
            $nama = $this->input->post('nama');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $nama_wali = $this->input->post('nama_wali');

            $this->db->set('id_pengurus', $id_pengurus);
            $this->db->set('nama', $nama);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('alamat', $alamat);
            $this->db->set('nama_wali', $nama_wali);
            $this->db->where('id_anak_didik', $id_anak_didik);
            $this->db->update('anak_didik');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/anak_didik');
        }
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['anak_didik'] = $this->Anakdidik_model->showAnakDidik();
        $this->load->view('admin/anak_didik/laporan_pdf', $data);
        // $this->dompdf->set_option('isRemoteEnabled', true);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Anak_Didik_BaitiJannati.pdf", array('Attachment ' => 0));
    }
}