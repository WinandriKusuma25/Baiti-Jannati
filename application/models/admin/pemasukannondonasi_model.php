<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pemasukannondonasi_model extends CI_Model
{
    public function showPemasukanNonDonasi()
    {

        $this->db->select('pemasukan_non_donasi.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'pemasukan_non_donasi.id_pengurus = pengurus.id_pengurus');
        return $this->db->get('pemasukan_non_donasi')->result();
    }

    public function tambahPemasukanNonDonasi()
    {
        $data = [
            'id_pemasukan' => $this->input->post('id_pemasukan', true),
            'id_pengurus' => $this->input->post('id_pengurus', true),
            'tgl_pemasukan' => $this->input->post('tgl_pemasukan', true),
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
        $this->db->select('pemasukan_non_donasi.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'pemasukan_non_donasi.id_pengurus = pengurus.id_pengurus');
        return $this->db->get_where('pemasukan_non_donasi', ['id_pemasukan' => $id_pemasukan])->result();
    }

    public function ubahPemasukanNonDonasi()
    {
        $data = [
            'id_pemasukan' => $this->input->post('id_pemasukan', true),
            'id_pengurus' => $this->input->post('id_pengurus', true),
            'tgl_pemasukan' => $this->input->post('tgl_pemasukan', true),
            'nominal' => $this->input->post('tgl_pemasukan', true),
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
        $query = $this->db->query("SELECT COUNT(*) FROM pemasukan_non_donasi where tgl_pemasukan = CURDATE() 
         ");
        return $query->row();
    }

    public function countBulan()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pemasukan_non_donasi where  
                MONTH(tgl_pemasukan) = MONTH(NOW())");
        return $query->row();
    }

    public function countTahun()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pemasukan_non_donasi where  
                YEAR(tgl_pemasukan) = YEAR(NOW())");
        return $query->row();
    }

    public function nominalHari()
    {
        $query = $this->db->query("SELECT * FROM pemasukan_non_donasi where tgl_pemasukan = CURDATE()");
        return $query->result();
    }

    public function nominalBulan()
    {
        $query = $this->db->query("SELECT * FROM pemasukan_non_donasi where 
            MONTH(tgl_pemasukan) = MONTH(NOW())");
        return $query->result();
    }

    public function nominalTahun()
    {
        $query = $this->db->query("SELECT * FROM pemasukan_non_donasi where 
            YEAR(tgl_pemasukan) = YEAR(NOW())");
        return $query->result();
    }

    public function showPemasukanNonDonasiFilter($daterange)
    {

        $this->db->select('pemasukan_non_donasi.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'pemasukan_non_donasi.id_pengurus = pengurus.id_pengurus');
        $this->db->where('tgl_pemasukan >=', $daterange[0]);
        $this->db->where('tgl_pemasukan <=',  $daterange[1]);
        return $this->db->get('pemasukan_non_donasi')->result();
    }

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
        $this->db->select('MONTHNAME(tgl_pemasukan) as month, 
        SUM(IF(MONTH(tgl_pemasukan)=MONTH(tgl_pemasukan) , nominal, 0)) as revenue');
        $this->db->from('pemasukan_non_donasi');
        $this->db->group_by('tgl_pemasukan');
        $this->db->order_by('tgl_pemasukan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getMonth()
    {
        $this->db->select('MONTHNAME(tgl_pemasukan) as month');
        $this->db->from('pemasukan_non_donasi');
        $this->db->group_by('tgl_pemasukan');
        $this->db->order_by('id_pemasukan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getStatistics()
    {
        $this->db->select('SUM(IF(DAY(tgl_pemasukan)=(DAY(CURRENT_DATE()) -1), nominal, 0)) as lastDay,
        SUM(IF(DAY(tgl_pemasukan)=DAY(CURRENT_DATE()), nominal, 0)) as daily, 
        SUM(IF(MONTH(tgl_pemasukan)=(MONTH(CURRENT_DATE()) -1), nominal, 0)) as lastMonth,
        SUM(IF(MONTH(tgl_pemasukan)=MONTH(CURRENT_DATE()), nominal, 0)) as monthly, 
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