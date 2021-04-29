<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public function getDonasiNonKeuangan($limit = null, $id_non_keuangan = null, $range = null)
    {
        $this->db->select('donasi_non_keuangan.*, user.nama_user, satuan.satuan');
        $this->db->join('user', 'donasi_non_keuangan.id_user = user.id_user');
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
        $this->db->select('pengeluaran_donasi.*, user.name');
        $this->db->join('user', 'pengeluaran_donasi.id_user = user.id_user');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_pengeluaran != null) {
            $this->db->where('id_donasi_tunai', $id_pengeluaran);
        }

        if ($range != null) {
            $this->db->where('created_at' . ' >=', $range['mulai']);
            $this->db->where('created_at' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_pengeluaran', 'DESC');
        return $this->db->get('pengeluaran_donasi')->result_array();
    }
}