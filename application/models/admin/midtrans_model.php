<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Midtrans_model extends CI_Model
{

    public function showTransaksiMidtransAll()
    {

        $this->db->select('transaksi_midtrans.*, user.*');
        $this->db->join('user', 'transaksi_midtrans.id_user = user.id_user');
        return $this->db->get_where('transaksi_midtrans')->result();
    }

    public function showTransaksiMidtrans($email)
    {

        $this->db->select('transaksi_midtrans.*, user.*');
        $this->db->join('user', 'transaksi_midtrans.id_user = user.id_user');
        $this->db->order_by('transaction_time', 'DESC');
        return $this->db->get_where('transaksi_midtrans', ['email' => $email])->result();
    }

    public function showTransaksiMidtransPending($email)
    {

        $this->db->select('transaksi_midtrans.*, user.*');
        $this->db->join('user', 'transaksi_midtrans.id_user = user.id_user');
        return $this->db->get_where('transaksi_midtrans', ['email' => $email, 'status_code' => '201'])->result();
    }

    public function getTransaksiMidtransDetail($order_id)
    {
        $this->db->select('transaksi_midtrans.*, user.*');
        $this->db->join('user', 'transaksi_midtrans.id_user = user.id_user');
        return $this->db->get_where('transaksi_midtrans', ['order_id' => $order_id])->result();
    }

    public function filter()
    {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        if ($this->session->userdata('startSession') == null && $this->session->userdata('endSession') == null) {
            $this->session->set_userdata('startSession', $start);
            $this->session->set_userdata('endSession', $end);
        } else if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null && $start != null && $end != null) {
            $this->session->set_userdata('startSession', $start);
            $this->session->set_userdata('endSession', $end);
        }
        $stSession = $this->session->userdata('startSession');
        $enSession =  $this->session->userdata('endSession');
        $this->db->select('*');
        $this->db->from('transaksi_midtrans');
        $this->db->join('user', 'transaksi_midtrans.id_user = user.id_user');
        $this->db->order_by('transaction_time', "asc");
        if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null) {
            $this->db->where("transaksi_midtrans.transaction_time BETWEEN ' $stSession 'AND' $enSession'");
        } else {
            $this->db->where("transaksi_midtrans.transaction_time BETWEEN '$start 'AND' $end'");
        }
        return $this->db->get()->result();
    }

    public function countHari()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_midtrans where  DAY(transaction_time) = DAY(NOW())    AND status_code = 200
         ");
        return $query->row();
    }

    public function countBulan()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_midtrans where  
                MONTH(transaction_time) = MONTH(NOW())   AND status_code = 200");
        return $query->row();
    }

    public function countTahun()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_midtrans where  
                YEAR(transaction_time) = YEAR(NOW())   AND status_code = 200");
        return $query->row();
    }

    public function NominalAll()
    {
        $this->db->select_sum('gross_amount');
        return $this->db->get_where('transaksi_midtrans', ['status_code' => '200'])->result();
    }

    public function nominalHari()
    {
        $query = $this->db->query("SELECT * FROM transaksi_midtrans where DAY(transaction_time) = DAY(NOW()) AND status_code = 200");
        return $query->result();
    }

    public function nominalBulan()
    {
        $query = $this->db->query("SELECT * FROM transaksi_midtrans where 
        MONTH(transaction_time) = MONTH(NOW()) AND status_code = 200");
        return $query->result();
    }

    public function nominalTahun()
    {
        $query = $this->db->query("SELECT * FROM transaksi_midtrans where 
            YEAR(transaction_time) = YEAR(NOW())  AND status_code = 200");
        return $query->result();
    }
}