<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Beranda';
        $this->load->view('template/header', $data);
        $this->load->view('index', $data);
        $this->load->view('template/footer', $data);
    }
}