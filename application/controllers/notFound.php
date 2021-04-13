<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotFound extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Situs tidak ditemukan';
        $this->load->view('templates/member/header', $data);
        $this->load->view('error', $data);
        $this->load->view('templates/member/footer');
    }
}