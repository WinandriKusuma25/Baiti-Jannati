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

    public function getDonasiKeuangan($limit = null, $id_donasi_tunai = null, $range = null)
    {
        $this->db->select('donasi_tunai.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'donasi_tunai.id_pengurus = pengurus.id_pengurus');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_donasi_tunai != null) {
            $this->db->where('id_donasi_tunai', $id_donasi_tunai);
        }

        if ($range != null) {
            $this->db->where('tgl_donasi' . ' >=', $range['mulai']);
            $this->db->where('tgl_donasi' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_donasi_tunai', 'DESC');
        return $this->db->get('donasi_tunai')->result_array();
    }
}