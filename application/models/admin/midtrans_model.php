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

    public function showTransaksiMidtransPendingAll()
    {

        $this->db->select('transaksi_midtrans.*, user.*');
        $this->db->join('user', 'transaksi_midtrans.id_user = user.id_user');
        return $this->db->get_where('transaksi_midtrans', ['status_code' => '200'])->result();
    }

    public function showTransaksiMidtransLimit()
    {

        $this->db->select('transaksi_midtrans.*, user.*');
        $this->db->join('user', 'transaksi_midtrans.id_user = user.id_user');
        $this->db->limit(5);
        return $this->db->get_where('transaksi_midtrans', ['status_code' => '200'])->result();
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
            $this->db->where("DATE(transaksi_midtrans.transaction_time) BETWEEN ' $stSession 'AND' $enSession'");
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


    public function getDateforChart()
    {
        $this->db->select('MONTHNAME(transaction_time) as month, 
        SUM(IF(MONTH(transaction_time)=MONTH(transaction_time) , gross_amount, 0)) as revenue');
        $this->db->from('transaksi_midtrans');
        $this->db->group_by('transaction_time');
        $this->db->order_by('transaction_time', 'DESC');
        $this->db->where('status_code', '200');


        return $this->db->get()->result_array();
    }

    public function getMonth()
    {
        $this->db->select('MONTHNAME(transaction_time) as month');
        $this->db->from('transaksi_midtrans');
        $this->db->group_by('transaction_time');
        $this->db->order_by('order_id', 'DESC');
        $this->db->where('status_code', '200');
        return $this->db->get()->result_array();
    }

    // public function getStatistics()
    // {
    //     $this->db->select('SUM(IF(DAY(transaction_time)=(DAY(CURRENT_DATE()) -1), gross_amount, 0)) as lastDay,
    //     SUM(IF(DAY(transaction_time)=DAY(CURRENT_DATE()), gross_amount, 0)) as daily, 
    //     SUM(IF(MONTH(transaction_time)=(MONTH(CURRENT_DATE()) -1), gross_amount, 0)) as lastMonth,
    //     SUM(IF(MONTH(transaction_time)=MONTH(CURRENT_DATE()), gross_amount, 0)) as monthly, 
    //         COUNT(order_id) amount, SUM(gross_amount) gross_amount');
    //     $this->db->from('transaksi_midtrans');
    //     return $this->db->get()->row_array();
    // }

    public function gettahun(){
        $query = $this->db->query("SELECT YEAR(transaction_time) AS tahun FROM 
            transaksi_midtrans GROUP BY YEAR(transaction_time) ORDER BY YEAR(transaction_time)
            ASC");
        return $query->result();
    }

    public function filterbytanggal($tanggalawal, $tanggalakhir){
        $query = $this->db->query("SELECT * FROM transaksi_midtrans INNER JOIN user ON transaksi_midtrans.id_user = user.id_user
         WHERE DATE(transaction_time) 
            BETWEEN '$tanggalawal' AND '$tanggalakhir'  AND status_code = 200 ORDER BY transaction_time ASC");
        return $query->result();
    }

    public function filterbybulan($tahun1, $bulanawal, $bulanakhir){
        $query = $this->db->query("SELECT * FROM transaksi_midtrans INNER JOIN user ON transaksi_midtrans.id_user = user.id_user WHERE YEAR(transaction_time) = 
            '$tahun1' AND MONTH(transaction_time) BETWEEN '$bulanawal' AND '$bulanakhir' AND status_code = 200
            ORDER BY transaction_time ASC");
        return $query->result();
    }

    public function filterbytahun($tahun2){
        $query = $this->db->query("SELECT * FROM transaksi_midtrans  INNER JOIN user ON transaksi_midtrans.id_user = user.id_user WHERE  YEAR(transaction_time) = 
            '$tahun2'  AND status_code = 200 ORDER BY transaction_time ASC ");
        return $query->result();
    }

    
    public function hapusTransaksiNonTunai($order_id)
    {
        $this->db->where('order_id', $order_id);
        if (
            $this->db->delete('transaksi_midtrans')
        ) {
            return true;
        } else {
            return false;
        }
    }

    
}