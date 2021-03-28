<?php

defined('BASEPATH') or exit('No direct script access allowed');

class laporan_model extends CI_Model
{

    public function getDonasiNonKeuangan($limit = null, $id_non_keuangan = null, $range = null)
    {
        $this->db->select('donasi_non_keuangan.*, pengurus.nama_pengurus, satuan.satuan');
        $this->db->join('pengurus', 'donasi_non_keuangan.id_pengurus = pengurus.id_pengurus');
        $this->db->join('satuan', 'donasi_non_keuangan.id_satuan = satuan.id_satuan');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_non_keuangan != null) {
            $this->db->where('id_non_keuangan', $id_non_keuangan);
        }

        if ($range != null) {
            $this->db->where('tgl_donasi' . ' >=', $range['mulai']);
            $this->db->where('tgl_donasi' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_non_keuangan', 'DESC');
        return $this->db->get('donasi_non_keuangan')->result_array();
    }

    public function getPengeluaranDonasi($limit = null, $id_pengeluaran = null, $range = null)
    {
        $this->db->select('pengeluaran_donasi.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'pengeluaran_donasi.id_pengurus = pengurus.id_pengurus');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_pengeluaran != null) {
            $this->db->where('id_donasi_tunai', $id_pengeluaran);
        }

        if ($range != null) {
            $this->db->where('tgl_pengeluaran' . ' >=', $range['mulai']);
            $this->db->where('tgl_pengeluaran' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_pengeluaran', 'DESC');
        return $this->db->get('pengeluaran_donasi')->result_array();
    }
}