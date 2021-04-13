<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluarandonasi_model extends CI_Model
{
    public function showPengeluaranDonasi()
    {

        $this->db->select('pengeluaran_donasi.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'pengeluaran_donasi.id_pengurus = pengurus.id_pengurus');
        return $this->db->get('pengeluaran_donasi')->result();
    }

    public function tambahPengeluaranDonasi()
    {
        $data = [
            'id_pengeluaran' => $this->input->post('id_pengeluaran', true),
            'id_pengurus' => $this->input->post('id_pengurus', true),
            'tgl_pengeluaran' => $this->input->post('tgl_pengeluaran', true),
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
        $this->db->select('pengeluaran_donasi.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'pengeluaran_donasi.id_pengurus = pengurus.id_pengurus');
        return $this->db->get_where('pengeluaran_donasi', ['id_pengeluaran' => $id_pengeluaran])->result();
    }

    public function ubahPengeluaranDonasi()
    {
        $data = [
            'id_pengeluaran' => $this->input->post('id_pengeluaran', true),
            'id_pengurus' => $this->input->post('id_pengurus', true),
            'tgl_pengeluaran' => $this->input->post('tgl_pengeluaran', true),
            'nominal' => $this->input->post('nominal', true),
            'keterangan' => $this->input->post('keterangan', true),
        ];
        $this->db->where('id_pengeluaran', $this->input->post('id_pengeluaran'));
        $this->db->update('pengeluaran_donasi', $data);
    }

    public function NominalAll()
    {
        $this->db->select_sum('nominal');
        return $this->db->get('pengeluaran_donasi')->result();
    }

    public function countHari()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pengeluaran_donasi where tgl_pengeluaran = CURDATE() 
         ");
        return $query->row();
    }

    public function countBulan()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pengeluaran_donasi where  
                MONTH(tgl_pengeluaran) = MONTH(NOW())");
        return $query->row();
    }

    public function countTahun()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM pengeluaran_donasi where  
                YEAR(tgl_pengeluaran) = YEAR(NOW())");
        return $query->row();
    }

    public function nominalHari()
    {
        $query = $this->db->query("SELECT * FROM pengeluaran_donasi where tgl_pengeluaran = CURDATE()");
        return $query->result();
    }

    public function nominalBulan()
    {
        $query = $this->db->query("SELECT * FROM pengeluaran_donasi where 
            MONTH(tgl_pengeluaran) = MONTH(NOW())");
        return $query->result();
    }

    public function nominalTahun()
    {
        $query = $this->db->query("SELECT * FROM pengeluaran_donasi where 
            YEAR(tgl_pengeluaran) = YEAR(NOW())");
        return $query->result();
    }

    public function showPengeluaranDonasiFilter($daterange)
    {

        $this->db->select('pengeluaran_donasi.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'pengeluaran_donasi.id_pengurus = pengurus.id_pengurus');
        $this->db->where('tgl_pengeluaran >=', $daterange[0]);
        $this->db->where('tgl_pengeluaran <=',  $daterange[1]);
        return $this->db->get('pengeluaran_donasi')->result();
    }

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
        $this->db->join('pengurus', 'pengeluaran_donasi.id_pengurus = pengurus.id_pengurus');
        $this->db->order_by('tgl_pengeluaran', "asc");
        if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null) {
            $this->db->where("pengeluaran_donasi.tgl_pengeluaran BETWEEN ' $stSession 'AND' $enSession'");
        } else {
            $this->db->where("pengeluaran_donasi.tgl_pengeluaran BETWEEN '$start 'AND' $end'");
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
        $this->db->select('MONTHNAME(tgl_pengeluaran) as month, 
        SUM(IF(MONTH(tgl_pengeluaran)=MONTH(tgl_pengeluaran) , nominal, 0)) as revenue');
        $this->db->from('pengeluaran_donasi');
        $this->db->group_by('tgl_pengeluaran');
        $this->db->order_by('id_pengeluaran', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getMonth()
    {
        $this->db->select('MONTHNAME(tgl_pengeluaran) as month');
        $this->db->from('pengeluaran_donasi');
        $this->db->group_by('tgl_pengeluaran');
        $this->db->order_by('id_pengeluaran', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getStatistics()
    {
        $this->db->select('SUM(IF(DAY(tgl_pengeluaran)=(DAY(CURRENT_DATE()) -1), nominal, 0)) as lastDay,
        SUM(IF(DAY(tgl_pengeluaran)=DAY(CURRENT_DATE()), nominal, 0)) as daily, 
        SUM(IF(MONTH(tgl_pengeluaran)=(MONTH(CURRENT_DATE()) -1), nominal, 0)) as lastMonth,
        SUM(IF(MONTH(tgl_pengeluaran)=MONTH(CURRENT_DATE()), nominal, 0)) as monthly, 
            COUNT(id_pengeluaran) amount, SUM(nominal) nominal');
        $this->db->from('pengeluaran_donasi');
        return $this->db->get()->row_array();
    }

    public function nominalTerbesar()
    {

        $this->db->select_max('nominal');
        return $this->db->get('pengeluaran_donasi')->result();
    }
}