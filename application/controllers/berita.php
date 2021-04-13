<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/Berita_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Berita';

        $config['base_url'] = 'http://localhost:8080/baitijannati/berita/index';
        $config['total_rows'] = $this->Berita_model->countAllBerita();
        $config['per_page'] = 3;

        $data['start'] = $this->uri->segment(3);
        $data['berita'] = $this->Berita_model->showBeritaPagination($config['per_page'], $data['start']);
        $data['title'] = 'Baiti Jannati | Berita';

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
        $this->load->view('berita', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id_berita)
    {
        $data['title'] = 'Baiti Jannati | Detail Berita';
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $data['berita'] = $this->Berita_model->getBerita($id_berita);
        $data['beritaTerbaru'] = $this->Berita_model->showBeritaTerbaru();
        $this->load->view('template/header', $data);
        $this->load->view('detail_berita', $data);
        $this->load->view('template/footer', $data);
    }
}