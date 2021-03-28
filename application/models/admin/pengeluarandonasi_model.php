<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pengeluarandonasi_model extends CI_Model
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
}