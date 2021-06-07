<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_tunai extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/Transaksitunai_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/User_model');
        $this->load->model('admin/Kategori_model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Tunai';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunai();
        $data['transaksi_tunai_hari'] = $this->Transaksitunai_model->countHari();
        $data['transaksi_tunai_bulan'] = $this->Transaksitunai_model->countBulan();
        $data['transaksi_tunai_tahun'] = $this->Transaksitunai_model->countTahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/index', $data);
        $this->load->view('templates/footer');
    }

    public function filter()
    {
        $this->session->unset_userdata('startdate');
        $this->session->unset_userdata('enddate');
        $data['title'] = 'Baiti Jannati | Transaksi Tunai Donasi ';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->filter();
        $data['transaksi_tunai_hari'] = $this->Transaksitunai_model->countHari();
        $data['transaksi_tunai_bulan'] = $this->Transaksitunai_model->countBulan();
        $data['transaksi_tunai_tahun'] = $this->Transaksitunai_model->countTahun();
        $data['nominal_hari'] = $this->Transaksitunai_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitunai_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitunai_model->nominalTahun();
        $data['nominal_all'] = $this->Transaksitunai_model->nominalAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Baiti Jannati | Detail Transaksi Donasi Tunai';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['users'] = $this->Transaksitunai_model->getTransaksiTunaiUser($id);
        // $data['pengurus'] = $this->Transaksitunai_model->getTransaksiTunaiPengurus($id);
        $data['transaksi_tunai'] = $this->Transaksitunai_model->getDonasiTransaksiTunai($id);
        $data['transaksi_tunai_tgl'] = $this->Transaksitunai_model->getTransaksiTunaiTglDonasi($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {

        $this->form_validation->set_rules('id_user', 'Nama Donatur', 'required|trim');
     

        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunai();
        $data['kategori'] = $this->Kategori_model->showKategoriKeuangan();
        $data['users'] = $this->User_model->tampilUserSaja();

        $data['id_kategori_uang'] = $this->Transaksitunai_model->getDataKategoriByUang();


        // $data['jumlah_form'] = $this->input->post('jumlah_form');
        // $data['jenis_donasi'] = $this->input->post('jenis_donasi');


        // var_dump($this->form_validation->run());
        // die();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Baiti Jannati | Tambah Transaksi Donasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/transaksi_tunai/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Transaksitunai_model->onInsertDataTransaksi();       
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/transaksi_tunai');
        }
    }

    

    public function editDonatur($id_donasi)
    {

        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunaiOne($id_donasi);
        $data['users'] = $this->User_model->tampilUserSaja();

        $this->form_validation->set_rules('id_user', 'Nama Donatur', 'required|trim');

        

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Baiti Jannati | Edit Donatur';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/transaksi_tunai/editDonatur', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Transaksitunai_model->ubahDonatur();
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
            redirect('admin/transaksi_tunai', 'refresh');
        }
    }



    // public function prosestambah()
    // {

    //     $config['upload_path'] = './assets/images/donasi_non_keuangan';
    //     $config['allowed_types'] = 'jpg|png|jpeg';
    //     // $config['file_name']  = $this->input->post('nama');
    //     $this->load->library('upload', $config);
        
    //     $files = $_FILES['foto'];

    //     $images = array();

    //     foreach ($files['name'] as $key => $image) {
    //         $_FILES['images[]']['name']= $files['name'][$key];
    //         $_FILES['images[]']['type']= $files['type'][$key];
    //         $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
    //         $_FILES['images[]']['error']= $files['error'][$key];
    //         $_FILES['images[]']['size']= $files['size'][$key];

    //         if ($this->upload->do_upload('images[]')) {
    //             $this->upload->data();
    //             $images[] = $this->upload->data("file_name");
    //         } else {
    //             return false;
    //         }
    //     }


    //     $jumlah_form = $this->input->post('jumlah_form');
    //     $jenis_donasi = $this->input->post('jenis_donasi');

    //     $data1 = array(
    //         'id_user' => $this->input->post('id_user'),
    //         'id_pengurus' => $this->input->post('id_pengurus'),
    //         'tgl_donasi' => date('Y-m-d H:i:s'),
    //     );

        

    //         //
    //     // model->insert data1
    //     $this->db->insert('transaksi_donasi_tunai', $data1);
    //     $id_donasi = $this->db->insert_id();
    //     $data2 = [];

    //     if ($jenis_donasi == 'keuangan') {
    //         for ($i=0; $i < $jumlah_form; $i++) { 
    //             $data2[] = array(
    //                 'id_donasi' => $id_donasi,
    //                 'jenis_donasi' => $jenis_donasi,
    //                 'nominal' => $this->input->post('nominal')[$i],
    //                 'keterangan' => $this->input->post('keterangan')[$i],
    //             );
    //         }
    //     } else if ($jenis_donasi == 'non keuangan') {
    //         for ($i=0; $i < $jumlah_form; $i++) { 
    //             $data2[] = array(        
    //                 'id_donasi' => $id_donasi,
    //                 'jenis_donasi' => $jenis_donasi,
    //                 'kategori' => $this->input->post('kategori')[$i],
    //                 'jumlah' => $this->input->post('jumlah')[$i],
    //                 'keterangan' => $this->input->post('keterangan')[$i],
    //                 'image' => $images[$i],

    //             );
    //         }

    //     }
    //     for ($i=0; $i < $jumlah_form; $i++) { 
    //         $this->db->insert('detail_donasi_tunai', $data2[$i]);
    //     }
    //     $this->session->set_flashdata(
    //         'message',
    //         '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //   Data berhasil di tambahkan ! 
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //         </button>
    //     </div>'
    //     );
    //     redirect('admin/transaksi_tunai');
    // }

    private function upload_files($path, $title, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = $title .'_'. $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
            } else {
                return false;
            }
        }

        return $images;
    }



    public function edit($id_detail_donasi)
    {
        $data['title'] = 'Baiti Jannati | Edit Detail Donasi Tunai';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['kategori'] = $this->Kategori_model->showKategoriKeuangan();
        $data['detail_donasi'] = $this->Transaksitunai_model->getDetailTransaksiTunai($id_detail_donasi);
        // $data['pengurus'] = $this->Pengurus_model->showPengurus();
        $this->form_validation->set_rules('id_donasi', 'Tanggal Kegiatan', 'required|trim');
        // $this->form_validation->set_rules('tgl_kegiatan', 'Tanggal Kegiatan', 'required|trim');
        // $this->form_validation->set_rules('tgl_kegiatan', 'tgl_kegiatan', 'required|trim');
        // $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/detail_donasi_tunai/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $id_donasi = $this->input->post('id_donasi');
            // check jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048; //2mb
                $config['upload_path']          = './assets/images/donasi_non_keuangan';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['detail_donasi_tunai']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/images/donasi_non_keuangan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }  

                $id_detail_donasi = $this->input->post('id_detail_donasi');
                $id_donasi = $this->input->post('id_donasi');
                $jenis_donasi = $this->input->post('jenis_donasi');
                $id_kategori = $this->input->post('id_kategori');
                $nominal = $this->input->post('nominal');
                $jumlah = $this->input->post('jumlah');
                $keterangan = $this->input->post('keterangan');

                $this->db->set('jenis_donasi', $jenis_donasi);
                $this->db->set('id_kategori', $id_kategori);
                $this->db->set('nominal', $nominal);
                $this->db->set('jumlah', $jumlah);
                $this->db->set('keterangan', $keterangan);
                $this->db->where('id_detail_donasi', $id_detail_donasi);
                $this->db->update('detail_donasi_tunai');

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di edit ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('admin/transaksi_tunai/detail/'. $id_donasi);
         }
    }


    public function hapus($id_donasi = null){

        if ( $id_donasi ) {
            $this->Transaksitunai_model->onDelete($id_donasi);
            $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Data Berhasil di hapus !
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                        </button>
                        </div>'
                    );
                    redirect('admin/transaksi_tunai');
        } else {

            echo "Data donasi tidak ditemukan";
        }

	}


    public function tampilKeuangan()
    {
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Tunai';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunaiKeuangan();
        $data['nominal_hari'] = $this->Transaksitunai_model->nominalHari();
        $data['nominal_bulan'] = $this->Transaksitunai_model->nominalBulan();
        $data['nominal_tahun'] = $this->Transaksitunai_model->nominalTahun();
        $data['nominal_all'] = $this->Transaksitunai_model->nominalAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/tampil_keuangan', $data);
        $this->load->view('templates/footer');
    }

    public function tampilNonKeuangan()
    {
        $data['title'] = 'Baiti Jannati | Transaksi Donasi Tunai';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['transaksi_tunai'] = $this->Transaksitunai_model->showDonasiTransaksiTunaiNonKeuangan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi_tunai/tampil_nonkeuangan', $data);
        $this->load->view('templates/footer');
    }

    public function cetak($id)
    {
        $data['users'] = $this->Transaksitunai_model->getTransaksiTunaiUser($id);
        $data['transaksi_tunai'] = $this->Transaksitunai_model->getDonasiTransaksiTunai($id);
        $data['transaksi_tunai_non'] = $this->Transaksitunai_model->getDonasiTransaksiTunaiNonKeuangan($id);
        $data['transaksi_tunai_tgl'] = $this->Transaksitunai_model->getTransaksiTunaiTglDonasi($id);
        $this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Invoice Donasi Tunai Baiti jannati.pdf"; 
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->load_view('admin/transaksi_tunai/invoice_pdf', $data);	
    }
}