<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
    public function showkegiatan()
    {

        return $this->db->get('kegiatan')->result();
    }

    public function addkegiatan($upload)
    {
        $data = [
            'id_kegiatan' => $this->input->post('id_kegiatan', true),
            'id_user' => $this->session->userdata('id_user'),
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'foto' => $upload['file']['file_name'],
        ];
        $this->db->insert('kegiatan', $data);
    }

    public function ubahkegiatan()
    {
        $data = [
            'id_kegiatan' => $this->input->post('id_kegiatan', true),
            'id_user' => $this->session->userdata('id_user'),
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),

        ];
        $this->db->where('id_kegiatan', $this->input->post('id_kegiatan'));
        $this->db->update('kegiatan', $data);
    }

      
    public function getkegiatan($id_kegiatan)
    {
        $this->db->select('kegiatan.*, user.name');
        $this->db->join('user', 'kegiatan.id_user = user.id_user');
        return $this->db->get_where('kegiatan', ['id_kegiatan' => $id_kegiatan])->result();
    }
    
    public function showkegiatanOne($id_kegiatan)
    {
        $this->db->select('kegiatan.*');
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->get('kegiatan')->result();
    }

    public function hapuskegiatan($id_kegiatan)
    {
        $this->db->where('id_kegiatan', $id_kegiatan);
        if (
            $this->db->delete('kegiatan')
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function upload()
    {
        $config['upload_path'] = './assets/images/kegiatan';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
}