<?php

defined('BASEPATH') or exit('No direct script access allowed');

class midtrans_model extends CI_Model
{
    public function showTransaksiMidtrans()
    {

        return $this->db->get('transaksi_midtrans')->result();
    }
}