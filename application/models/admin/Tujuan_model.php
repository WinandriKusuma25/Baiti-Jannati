<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tujuan_model extends CI_Model
{
    public function showtujuan()
    {

        return $this->db->get('tujuan')->result();
    }

    public function tambahtujuan()
    {
        $data = [
            'id_tujuan' => $this->input->post('id_tujuan', true),
            'id_user' => $this->session->userdata('id_user'),
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
        ];
        $this->db->insert('tujuan', $data);
    }

    public function ubahtujuan()
    {
        $data = [
            'id_tujuan' => $this->input->post('id_tujuan', true),
            'id_user' => $this->session->userdata('id_user'),
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),

        ];
        $this->db->where('id_tujuan', $this->input->post('id_tujuan'));
        $this->db->update('tujuan', $data);
    }
    public function showtujuanOne($id_tujuan)
    {
        $this->db->select('tujuan.*');
        $this->db->where('id_tujuan', $id_tujuan);
        return $this->db->get('tujuan')->result();
    }

    public function hapustujuan($id_tujuan)
    {
        $this->db->where('id_tujuan', $id_tujuan);
        if (
            $this->db->delete('tujuan')
        ) {
            return true;
        } else {
            return false;
        }
    }
}