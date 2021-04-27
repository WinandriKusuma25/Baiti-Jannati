<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/Jabatan_model');
        $this->load->model('admin/Pengaturan_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Kontak';
        $config['base_url'] = 'http://localhost:8080/baitijannati/kontak/index';
        $config['total_rows'] = $this->Pengurus_model->countAllPengurus();
        $config['per_page'] = 3;


        $data['start'] = $this->uri->segment(3);
        $data['pengurus'] = $this->Pengurus_model->showPengurusPagination($config['per_page'], $data['start']);
        $data['pengaturan'] = $this->Pengaturan_model->showPengaturan();
        $data['title'] = 'Baiti Jannati | Kontak';

        //styling
        $config['full_tag_open'] = '<nav>
        <ul class="pagination  justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = ' <li class="page-item">';
        $config['first_tag_close'] = ' </li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = ' <li class="page-item">';
        $config['last_tag_close'] = ' </li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = ' <li class="page-item">';
        $config['next_tag_close'] = ' </li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = ' <li class="page-item">';
        $config['prev_tag_close'] = ' </li>';

        $config['cur_tag_open'] = ' <li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = ' <li class="page-item ">';
        $config['num_tag_close'] = ' </li>';

        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);
        $this->load->view('template/header', $data);
        $this->load->view('kontak', $data);
        $this->load->view('template/footer', $data);
    }
}