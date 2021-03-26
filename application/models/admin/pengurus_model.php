<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pengurus_model extends CI_Model
{
    public function showPengurus()
    {
        $this->db->select('pengurus.*, jabatan.jabatan');
        $this->db->join('jabatan', 'pengurus.id_jabatan = jabatan.id_jabatan');
        return $this->db->get('pengurus')->result();
    }

    public function showPengurusPagination($limit, $start)
    {
        $this->db->select('pengurus.*, jabatan.jabatan');
        $this->db->join('jabatan', 'pengurus.id_jabatan = jabatan.id_jabatan');
        return $this->db->get('pengurus', $limit, $start)->result();
    }


    public function countAllPengurus()
    {
        return $this->db->get('pengurus')->num_rows();
    }


    public function showPengurusOne($id_pengurus)
    {
        $this->db->select('pengurus.*');
        $this->db->where('id_pengurus', $id_pengurus);
        return $this->db->get('pengurus')->result();
    }

    public function tambahPengurus()
    {
        $data = [
            'id_pengurus' => $this->input->post('id_pengurus', true),
            'id_jabatan' => $this->input->post('id_jabatan', true),
            'nama_pengurus' => $this->input->post('nama_pengurus', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'no_telp' => $this->input->post('no_telp', true),
        ];
        $this->db->insert('pengurus', $data);
    }

    public function ubahPengurus()
    {
        $data = [
            'id_pengurus' => $this->input->post('id_pengurus', true),
            'nama_pengurus' => $this->input->post('nama_pengurus', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'id_jabatan' => $this->input->post('id_jabatan', true),
            'no_telp' => $this->input->post('no_telp', true),
        ];
        $this->db->where('id_pengurus', $this->input->post('id_pengurus'));
        $this->db->update('pengurus', $data);
    }

    public function hapusPengurus($id_pengurus)
    {
        $this->db->where('id_pengurus', $id_pengurus);
        if (
            $this->db->delete('pengurus')
        ) {
            return true;
        } else {
            return false;
        }
    }
}