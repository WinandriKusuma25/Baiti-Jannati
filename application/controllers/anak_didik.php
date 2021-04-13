<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak_didik extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->model('admin/Anakdidik_model');
        $this->load->model('admin/Pengurus_model');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }


    public function index()
    {

        //config
        $config['base_url'] = 'http://localhost:8080/baitijannati/anak_didik/index';
        $config['total_rows'] = $this->Anakdidik_model->countAllAnakDidik();
        $config['per_page'] = 6;

        $data['start'] = $this->uri->segment(3);
        $data['anak_didik'] = $this->Anakdidik_model->showAnakDidikPagination($config['per_page'], $data['start']);
        $data['title'] = 'Baiti Jannati | Anak Didik';

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


        //initialize
        $this->pagination->initialize($config);
        $this->load->view('template/header', $data);
        $this->load->view('anak_didik', $data);
        $this->load->view('template/footer', $data);
    }
}