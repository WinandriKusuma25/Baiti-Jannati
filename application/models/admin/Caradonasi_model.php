<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Caradonasi_model extends CI_Model
{
    public function showCaraDonasi()
    {

        return $this->db->get('cara_donasi')->result();
    }

    public function tambahCaraDonasi()
    {
        $data = [
            'id_cara' => $this->input->post('id_cara', true),
            'id_user' => $this->session->userdata('id_user'),
            'pertanyaan' => $this->input->post('pertanyaan', true),
            'jawaban' => $this->input->post('jawaban', true),
        ];
        $this->db->insert('cara_donasi', $data);
    }

    public function ubahCaraDonasi()
    {
        $data = [
            'id_cara' => $this->input->post('id_cara', true),
            'id_user' => $this->session->userdata('id_user'),
            'pertanyaan' => $this->input->post('pertanyaan', true),
            'jawaban' => $this->input->post('jawaban', true),

        ];
        $this->db->where('id_cara', $this->input->post('id_cara'));
        $this->db->update('cara_donasi', $data);
    }
    public function showCaraDonasiOne($id_cara)
    {
        $this->db->select('cara_donasi.*');
        $this->db->where('id_cara', $id_cara);
        return $this->db->get('cara_donasi')->result();
    }

    public function hapusCaraDonasi($id_cara)
    {
        $this->db->where('id_cara', $id_cara);
        if (
            $this->db->delete('cara_donasi')
        ) {
            return true;
        } else {
            return false;
        }
    }
}