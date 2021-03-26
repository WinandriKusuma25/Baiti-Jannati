<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jabatan_model extends CI_Model
{
    public function showJabatan()
    {

        return $this->db->get('jabatan')->result();
    }

    public function tambahJabatan()
    {
        $data = [
            'id_jabatan' => $this->input->post('id_jabatan', true),
            'jabatan' => $this->input->post('jabatan', true),
        ];
        $this->db->insert('jabatan', $data);
    }

    public function ubahJabatan()
    {
        $data = [
            'id_jabatan' => $this->input->post('id_jabatan', true),
            'jabatan' => $this->input->post('jabatan', true),

        ];
        $this->db->where('id_jabatan', $this->input->post('id_jabatan'));
        $this->db->update('jabatan', $data);
    }
    public function showJabatanOne($id_jabatan)
    {
        $this->db->select('jabatan.*');
        $this->db->where('id_jabatan', $id_jabatan);
        return $this->db->get('jabatan')->result();
    }

    public function hapusJabatan($id_jabatan)
    {
        $this->db->where('id_jabatan', $id_jabatan);
        if (
            $this->db->delete('jabatan')
        ) {
            return true;
        } else {
            return false;
        }
    }
}