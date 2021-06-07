<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bank_model extends CI_Model
{
    public function showBank()
    {
        return $this->db->get('bank')->result();
    }

    public function tambahBank()
    {
        $data = [
            'id_bank' => $this->input->post('id_bank', true),
            'nama_bank' => $this->input->post('nama_bank', true),
            'no_rekening' => $this->input->post('no_rekening', true),
        ];
        $this->db->insert('bank', $data);
    }

    public function ubahbank()
    {
        $data = [
            'id_bank' => $this->input->post('id_bank', true),
            'nama_bank' => $this->input->post('nama_bank', true),
            'no_rekening' => $this->input->post('no_rekening', true),

        ];
        $this->db->where('id_bank', $this->input->post('id_bank'));
        $this->db->update('bank', $data);
    }

    public function showBankOne($id_bank)
    {
        $this->db->select('bank.*');
        $this->db->where('id_bank', $id_bank);
        return $this->db->get('bank')->result();
    }

    public function hapusBank($id_bank)
    {
        $this->db->where('id_bank', $id_bank);
        if (
            $this->db->delete('bank')
        ) {
            return true;
        } else {
            return false;
        }
    }
}