<?php

defined('BASEPATH') or exit('No direct script access allowed');

class midtrans_model extends CI_Model
{
    public function showTransaksiMidtrans($email)
    {

        $this->db->select('transaksi_midtrans.*, user.name');
        $this->db->join('user', 'transaksi_midtrans.id_user = user.id_user');
        return $this->db->get_where('transaksi_midtrans', ['email' => $email])->result();
    }

    public function getTransaksiMidtransDetail($order_id)
    {
        $this->db->select('transaksi_midtrans.*, user.*');
        $this->db->join('user', 'transaksi_midtrans.id_user = user.id_user');
        return $this->db->get_where('transaksi_midtrans', ['order_id' => $order_id])->result();
    }
}