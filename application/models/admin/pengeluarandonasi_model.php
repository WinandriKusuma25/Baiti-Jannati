<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluarandonasi_model extends CI_Model
{
    public function showPengeluaranDonasi()
    {

        $this->db->select('pengeluaran_donasi.*, user.name');
        $this->db->join('user', 'pengeluaran_donasi.id_user = user.id_user');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('pengeluaran_donasi')->result();
    }


    public function showPengeluaranDonasiLimit()
    {

        $this->db->select('pengeluaran_donasi.*, user.name');
        $this->db->join('user', 'pengeluaran_donasi.id_user = user.id_user');
        $this->db->limit(5);
        $this->db->order_by('id_pengeluaran', 'DESC');
        return $this->db->get('pengeluaran_donasi')->result();
    }

    public function NominalLimit()
    {
        $this->db->select_sum('nominal');
        $this->db->limit(5);
        return $this->db->get('pengeluaran_donasi')->result();
    }


    public function tambahPengeluaranDonasi()
    {
        $data = [
            'id_pengeluaran' => $this->input->post('id_pengeluaran', true),
            'id_user' =>  $this->session->userdata('id_user'),
            'nominal' => $this->input->post('nominal', true),
            'keterangan' => $this->input->post('keterangan', true),
        ];
        $this->db->insert('pengeluaran_donasi', $data);
    }

    public function showPengeluaranDonasiOne($id_pengeluaran)
    {
        $this->db->select('pengeluaran_donasi.*');
        $this->db->where('id_pengeluaran', $id_pengeluaran);
        return $this->db->get('pengeluaran_donasi')->result();
    }

    public function getPengeluaranDonasi($id_pengeluaran)
    {
        $this->db->select('pengeluaran_donasi.*, user.name');
        $this->db->join('user', 'pengeluaran_donasi.id_user = user.id_user');
        return $this->db->get_where('pengeluaran_donasi', ['id_pengeluaran' => $id_pengeluaran])->result();
    }

    public function ubahPengeluaranDonasi()
    {
        $data = [
            'id_pengeluaran' => $this->input->post('id_pengeluaran', true),
            'id_user' =>  $this->session->userdata('id_user'),
            'nominal' => $this->input->post('nominal', true),
            'keterangan' => $this->input->post('keterangan', true),
        ];
        $this->db->where('id_pengeluaran', $this->input->post('id_pengeluaran'));
        $this->db->update('pengeluaran_donasi', $data);
    }

  

    public function countHari()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pengeluaran_donasi where  
        DAY(created_at) = DAY(NOW()) ");
        return $query->row();
    }

    public function countBulan()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pengeluaran_donasi where  
                MONTH(created_at) = MONTH(NOW())");
        return $query->row();
    }

    public function countTahun()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pengeluaran_donasi where  
                YEAR(created_at) = YEAR(NOW())");
        return $query->row();
    }

    public function NominalAll()
    {
        $this->db->select_sum('nominal');
        return $this->db->get('pengeluaran_donasi')->result();
    }

    public function nominalHari()
    {
        $query = $this->db->query("SELECT * FROM pengeluaran_donasi where DAY(created_at) = DAY(NOW()) ");
        return $query->result();
    }

    public function nominalBulan()
    {
        $query = $this->db->query("SELECT * FROM pengeluaran_donasi where 
            MONTH(created_at) = MONTH(NOW())");
        return $query->result();
    }

    public function nominalTahun()
    {
        $query = $this->db->query("SELECT * FROM pengeluaran_donasi where 
            YEAR(created_at) = YEAR(NOW())");
        return $query->result();
    }

    // public function showPengeluaranDonasiFilter($daterange)
    // {

    //     $this->db->select('pengeluaran_donasi.*, user.name');
    //     $this->db->join('user', 'pengeluaran_donasi.id_user = user.id_user');
    //     $this->db->where('created_at >=', $daterange[0]);
    //     $this->db->where('created_at <=',  $daterange[1]);
    //     return $this->db->get('pengeluaran_donasi')->result();
    // }

    public function hapusPengeluaranDonasi($id_pengeluaran)
    {
        $this->db->where('id_pengeluaran', $id_pengeluaran);
        if (
            $this->db->delete('pengeluaran_donasi')
        ) {
            return true;
        } else {
            return false;
        }
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
        $this->db->from('pengeluaran_donasi');
        $this->db->join('user', 'pengeluaran_donasi.id_user = user.id_user');
        $this->db->order_by('created_at', "DESC");
        if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null) {
            $this->db->where("DATE(pengeluaran_donasi.created_at) BETWEEN ' $stSession 'AND' $enSession'");
        } else {
            $this->db->where("pengeluaran_donasi.created_at BETWEEN '$start 'AND' $end'");
        }
        return $this->db->get()->result();
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

    public function chartPengeluaranDonasi($bulan)
    {
        $like = 'T-PD-' . date('y') . $bulan;
        $this->db->like('id_pengeluaran', $like, 'after');
        return count($this->db->get('pengeluaran_donasi')->result_array());
    }


    public function getDateforChart()
    {
        $this->db->select('MONTHNAME(created_at) as month, 
        SUM(IF(MONTH(created_at)=MONTH(created_at) , nominal, 0)) as revenue');
        $this->db->from('pengeluaran_donasi');
        $this->db->group_by('created_at');
        $this->db->order_by('id_pengeluaran', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getMonth()
    {
        $this->db->select('MONTHNAME(created_at) as month');
        $this->db->from('pengeluaran_donasi');
        $this->db->group_by('created_at');
        $this->db->order_by('id_pengeluaran', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getStatistics()
    {
        $this->db->select('SUM(IF(DAY(created_at)=(DAY(CURRENT_DATE()) -1), nominal, 0)) as lastDay,
        SUM(IF(DAY(created_at)=DAY(CURRENT_DATE()), nominal, 0)) as daily, 
        SUM(IF(MONTH(created_at)=(MONTH(CURRENT_DATE()) -1), nominal, 0)) as lastMonth,
        SUM(IF(MONTH(created_at)=MONTH(CURRENT_DATE()), nominal, 0)) as monthly, 
            COUNT(id_pengeluaran) amount, SUM(nominal) nominal');
        $this->db->from('pengeluaran_donasi');
        return $this->db->get()->row_array();
    }

    public function nominalTerbesar()
    {

        $this->db->select_max('nominal');
        return $this->db->get('pengeluaran_donasi')->result();
    }


      
    public function gettahun(){
        $query = $this->db->query("SELECT YEAR(created_at) AS tahun FROM 
            pengeluaran_donasi GROUP BY YEAR(created_at) ORDER BY YEAR(created_at)
            ASC");
        return $query->result();
    }
    
    public function filterbytanggal( $tanggalawal, $tanggalakhir){
        $query = $this->db->query("SELECT * FROM pengeluaran_donasi INNER JOIN user ON pengeluaran_donasi.id_user = user.id_user
         WHERE DATE(created_at) 
            BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY created_at ASC");
        return $query->result();
    }

    public function filterbytahun($tahun2){
        $query = $this->db->query("SELECT * FROM pengeluaran_donasi  INNER JOIN user ON pengeluaran_donasi.id_user = user.id_user WHERE  YEAR(created_at) = 
            '$tahun2' ORDER BY created_at ASC");

        return $query->result();
    }

    public function filterbybulan($tahun1, $bulanawal, $bulanakhir){
        $query = $this->db->query("SELECT * FROM pengeluaran_donasi INNER JOIN user ON pengeluaran_donasi.id_user = user.id_user WHERE YEAR(created_at) = 
            '$tahun1' AND MONTH(created_at) BETWEEN '$bulanawal' AND '$bulanakhir'
            ORDER BY created_at ASC");
        return $query->result();
    }
}