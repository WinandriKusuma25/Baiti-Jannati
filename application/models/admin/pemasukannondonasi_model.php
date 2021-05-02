<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukannondonasi_model extends CI_Model
{
    public function showPemasukanNonDonasi()
    {

        $this->db->select('pemasukan_non_donasi.*, user.name');
        $this->db->join('user', 'pemasukan_non_donasi.id_user = user.id_user');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('pemasukan_non_donasi')->result();
    }

    public function showPemasukanNonDonasiLimit()
    {

        $this->db->select('pemasukan_non_donasi.*, user.name');
        $this->db->join('user', 'pemasukan_non_donasi.id_user = user.id_user');
        $this->db->limit(5);
        $this->db->order_by('id_pemasukan', 'DESC');
        return $this->db->get('pemasukan_non_donasi')->result();
    }

    public function tambahPemasukanNonDonasi()
    {
        $data = [
            'id_pemasukan' => $this->input->post('id_pemasukan', true),
            'id_user' =>  $this->session->userdata('id_user'),
            'nominal' => $this->input->post('nominal', true),
            'keterangan' => $this->input->post('keterangan', true),
        ];
        $this->db->insert('pemasukan_non_donasi', $data);
    }

    public function showPemasukanNonDonasiOne($id_pemasukan)
    {
        $this->db->select('pemasukan_non_donasi.*');
        $this->db->where('id_pemasukan', $id_pemasukan);
        return $this->db->get('pemasukan_non_donasi')->result();
    }

    public function getPemasukanNonDonasi($id_pemasukan)
    {
        $this->db->select('pemasukan_non_donasi.*, user.name');
        $this->db->join('user', 'pemasukan_non_donasi.id_user = user.id_user');
        return $this->db->get_where('pemasukan_non_donasi', ['id_pemasukan' => $id_pemasukan])->result();
    }

    public function ubahPemasukanNonDonasi()
    {
        $data = [
            'id_pemasukan' => $this->input->post('id_pemasukan', true),
            'id_user' =>  $this->session->userdata('id_user'),
            'nominal' => $this->input->post('nominal', true),
            'keterangan' => $this->input->post('keterangan', true),

        ];
        $this->db->where('id_pemasukan', $this->input->post('id_pemasukan'));
        $this->db->update('pemasukan_non_donasi', $data);
    }

    public function NominalAll()
    {
        $this->db->select_sum('nominal');
        return $this->db->get('pemasukan_non_donasi')->result();
    }


    // 123
    public function countHari()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pemasukan_non_donasi where  
        DAY(created_at) = DAY(NOW())
         ");
        return $query->row();
    }

    public function countBulan()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pemasukan_non_donasi where  
                MONTH(created_at) = MONTH(NOW())");
        return $query->row();
    }

    public function countTahun()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pemasukan_non_donasi where  
                YEAR(created_at) = YEAR(NOW())");
        return $query->row();
    }

    public function nominalHari()
    {
        $query = $this->db->query("SELECT * FROM pemasukan_non_donasi where  DAY(created_at) = DAY(NOW())");
        return $query->result();
    }

    public function nominalBulan()
    {
        $query = $this->db->query("SELECT * FROM pemasukan_non_donasi where 
            MONTH(created_at) = MONTH(NOW())");
        return $query->result();
    }

    public function nominalTahun()
    {
        $query = $this->db->query("SELECT * FROM pemasukan_non_donasi where 
            YEAR(created_at) = YEAR(NOW())");
        return $query->result();
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
        $this->db->from('pemasukan_non_donasi');
        $this->db->join('user', 'pemasukan_non_donasi.id_user = user.id_user');
        $this->db->order_by('created_at', "asc");
        if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null) {
            $this->db->where("DATE(pemasukan_non_donasi.created_at) BETWEEN ' $stSession 'AND' $enSession'");
        } else {
            $this->db->where("pemasukan_non_donasi.created_at BETWEEN '$start 'AND' $end'");
        }
        return $this->db->get()->result();
    }

    // public function showPemasukanNonDonasiFilter($daterange)
    // {

    //     $this->db->select('pemasukan_non_donasi.*, user.name');
    //     $this->db->join('user', 'pemasukan_non_donasi.id_user = user.id_user');
    //     $this->db->where('created_at >=', $daterange[0]);
    //     $this->db->where('created_at <=',  $daterange[1]);
    //     return $this->db->get('pemasukan_non_donasi')->result();
    // }

    public function hapusPemasukanNonDonasi($id_pemasukan)
    {
        $this->db->where('id_pemasukan', $id_pemasukan);
        if (
            $this->db->delete('pemasukan_non_donasi')
        ) {
            return true;
        } else {
            return false;
        }
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

    // public function chartPengeluaranDonasi($bulan)
    // {
    //     $like = 'T-PD-' . date('y') . $bulan;
    //     $this->db->like('id_pemasukan', $like, 'after');
    //     return count($this->db->get('pemasukan_non_donasi')->result_array());
    // }


    public function getDateforChart()
    {
        $this->db->select('MONTHNAME(created_at) as month, 
        SUM(IF(MONTH(created_at)=MONTH(created_at) , nominal, 0)) as revenue');
        $this->db->from('pemasukan_non_donasi');
        $this->db->group_by('created_at');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getMonth()
    {
        $this->db->select('MONTHNAME(created_at) as month');
        $this->db->from('pemasukan_non_donasi');
        $this->db->group_by('created_at');
        $this->db->order_by('id_pemasukan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getStatistics()
    {
        $this->db->select('SUM(IF(DAY(created_at)=(DAY(CURRENT_DATE()) -1), nominal, 0)) as lastDay,
        SUM(IF(DAY(created_at)=DAY(CURRENT_DATE()), nominal, 0)) as daily, 
        SUM(IF(MONTH(created_at)=(MONTH(CURRENT_DATE()) -1), nominal, 0)) as lastMonth,
        SUM(IF(MONTH(created_at)=MONTH(CURRENT_DATE()), nominal, 0)) as monthly, 
            COUNT(id_pemasukan) amount, SUM(nominal) nominal');
        $this->db->from('pemasukan_non_donasi');
        return $this->db->get()->row_array();
    }

    public function nominalTerbesar()
    {

        $this->db->select_max('nominal');
        return $this->db->get('pemasukan_non_donasi')->result();
    }
}