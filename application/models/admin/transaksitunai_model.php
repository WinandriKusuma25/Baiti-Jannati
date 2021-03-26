<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksitunai_model extends CI_Model
{
    public function showDonasiTransaksiTunai()
    {

        $this->db->select('transaksi_donasi_tunai.*, user.name, pengurus.nama_pengurus, detail_donasi_tunai.*');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('detail_donasi_tunai', 'transaksi_donasi_tunai.id_donasi = detail_donasi_tunai.id_donasi');
        return $this->db->get('transaksi_donasi_tunai')->result();
    }


    // public function getDonasiTransaksiTunai($id_detail_donasi)
    // {
    //     $this->db->select('detail_donasi_tunai.*, user.name, pengurus.nama_pengurus, transaksi_donasi_tunai.*');
    //     $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
    //     $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
    //     $this->db->join('transaksi_donasi_tunai', 'detail_donasi_tunai.id_donasi = transaksi_donasi_tunai.id_donasi');
    //     $this->db->where('id_detail_donasi', $id_detail_donasi);
    //     return $this->db->get('detail_donasi_tunai')->result();
    // }

    public function getDonasiTransaksiTunai($id_donasi)
    {
        $this->db->select('transaksi_donasi_tunai.*, user.name, pengurus.nama_pengurus, detail_donasi_tunai.*');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('detail_donasi_tunai', 'transaksi_donasi_tunai.id_donasi = detail_donasi_tunai.id_donasi');
        $this->db->where('id_detail_donasi', $id_donasi);
        return $this->db->get('transaksi_donasi_tunai')->result();
    }
}