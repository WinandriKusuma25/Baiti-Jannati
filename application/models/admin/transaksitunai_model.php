<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksitunai_model extends CI_Model
{
    public function showDonasiTransaksiTunaiAll()
    {

        $this->db->select('transaksi_donasi_tunai.*, user.name, pengurus.nama_pengurus, detail_donasi_tunai.*');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('detail_donasi_tunai', 'transaksi_donasi_tunai.id_donasi = detail_donasi_tunai.id_donasi');
        return $this->db->get('transaksi_donasi_tunai')->result();
    }


    public function showDonasiTransaksiTunai()
    {

        $this->db->select('transaksi_donasi_tunai.*, user.name, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        return $this->db->get('transaksi_donasi_tunai')->result();
    }



    // public function getDonasiTransaksiTunai($id_detail_donasi)
    // {
    //     $this->db->select('transaksi_donasi_tunai.*, user.name, pengurus.nama_pengurus, detail_donasi_tunai.*');
    //     $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
    //     $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
    //     $this->db->join('transaksi_donasi_tunai', 'detail_donasi_tunai.id_donasi = transaksi_donasi_tunai.id_donasi');
    //     $this->db->where('detail_donasi_tunai.id_donasi', $id_detail_donasi);
    //     return $this->db->get('transaksi_donasi_tunai')->result();
    // }

    public function getDonasiTransaksiTunai($id)
    {
        $this->db->select('detail_donasi_tunai.*, user.name, pengurus.nama_pengurus, transaksi_donasi_tunai.*');
        $this->db->join('transaksi_donasi_tunai', 'detail_donasi_tunai.id_donasi = transaksi_donasi_tunai.id_donasi');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->where('detail_donasi_tunai.id_donasi', $id);
        // $this->db->limit(1);
        return $this->db->get('detail_donasi_tunai')->result();
    }


    public function getTransaksiTunaiUser($id)
    {
        $this->db->select('transaksi_donasi_tunai.*, user.*');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->where('id_donasi', $id);
        return $this->db->get('transaksi_donasi_tunai')->result();
    }

    public function getTransaksiTunaiPengurus($id)
    {
        $this->db->select('transaksi_donasi_tunai.*, pengurus.*');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->where('id_donasi', $id);
        return $this->db->get('transaksi_donasi_tunai')->result();
    }

    public function getTransaksiTunaiTglDonasi($id)
    {
        $this->db->select('transaksi_donasi_tunai.tgl_donasi');
        $this->db->where('id_donasi', $id);
        return $this->db->get('transaksi_donasi_tunai')->result();
    }

    //model untuk member
    public function showDonasiTransaksiTunaiMember($email)
    {

        $this->db->select('transaksi_donasi_tunai.*, user.name, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        return $this->db->get_where('transaksi_donasi_tunai', ['email' => $email])->result();
    }

    public function NominalAll()
    {
        // $this->db->select_sum('nominal');
        return $this->db->get('transaksi_donasi_tunai')->result();
    }


    // 123
    public function countHari()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_donasi_tunai where tgl_donasi = CURDATE() 
         ");
        return $query->row();
    }

    public function countBulan()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_donasi_tunai where  
                MONTH(tgl_donasi) = MONTH(NOW())");
        return $query->row();
    }

    public function countTahun()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_donasi_tunai where  
                YEAR(tgl_donasi) = YEAR(NOW())");
        return $query->row();
    }

    public function nominalHari()
    {
        $query = $this->db->query("SELECT * FROM transaksi_donasi_tunai where tgl_donasi = CURDATE()");
        return $query->result();
    }

    public function nominalBulan()
    {
        $query = $this->db->query("SELECT * FROM transaksi_donasi_tunai where 
            MONTH(tgl_donasi) = MONTH(NOW())");
        return $query->result();
    }

    public function nominalTahun()
    {
        $query = $this->db->query("SELECT * FROM transaksi_donasi_tunai where 
            YEAR(tgl_donasi) = YEAR(NOW())");
        return $query->result();
    }


    public function showTransaksiTunaiFilter($daterange)
    {

        $this->db->select('transaksi_donasi_tunai.*, pengurus.nama_pengurus, user.*');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->where('tgl_donasi >=', $daterange[0]);
        $this->db->where('tgl_donasi <=',  $daterange[1]);
        return $this->db->get('transaksi_donasi_tunai')->result();
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function chartTransaksiDonasiTunai($bulan)
    {
        $like = 'T-TDT-' . date('y') . $bulan;
        $this->db->like('id_donasi', $like, 'after');
        return count($this->db->get('transaksi_donasi_tunai')->result_array());
    }

    public function getMonth()
    {
        $this->db->select('MONTHNAME(tgl_donasi) as month');
        $this->db->from('transaksi_donasi_tunai');
        $this->db->group_by('tgl_donasi');
        $this->db->order_by('id_pemasukan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getStatistics()
    {
        $this->db->select('SUM(IF(DAY(tgl_donasi)=(DAY(CURRENT_DATE()) -1), nominal, 0)) as lastDay,
        SUM(IF(DAY(tgl_donasi)=DAY(CURRENT_DATE()), nominal, 0)) as daily, 
        SUM(IF(MONTH(tgl_donasi)=(MONTH(CURRENT_DATE()) -1), nominal, 0)) as lastMonth,
        SUM(IF(MONTH(tgl_donasi)=MONTH(CURRENT_DATE()), nominal, 0)) as monthly, 
            COUNT(id_pemasukan) amount, SUM(nominal) nominal');
        $this->db->from('pemasukan_nontransaksi_donasi_tunai_donasi');
        return $this->db->get()->row_array();
    }

    public function nominalTerbesar()
    {

        $this->db->select_max('nominal');
        return $this->db->get('transaksi_donasi_tunai')->result();
    }
}