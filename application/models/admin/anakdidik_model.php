<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anakdidik_model extends CI_Model
{
    public function showAnakDidik()
    {
        $this->db->select('anak_didik.*, user.name');
        $this->db->join('user', 'anak_didik.id_user = user.id_user');
        return $this->db->get('anak_didik')->result();
    }

    public function countAllAnakDidik()
    {
        return $this->db->get('anak_didik')->num_rows();
    }


    public function showAnakDidikPagination($limit, $start)
    {
        $this->db->select('anak_didik.*, user.name');
        $this->db->join('user', 'anak_didik.id_user = user.id_user');
        return $this->db->get('anak_didik', $limit, $start)->result();
    }

    public function getAnakDidik($id_anak_didik)
    {
        $this->db->select('anak_didik.*, user.name');
        $this->db->join('user', 'anak_didik.id_user = user.id_user');
        return $this->db->get_where('anak_didik', ['id_anak_didik' => $id_anak_didik])->result();
    }

    public function showAnakDidikLimit()
    {
        $this->db->select('anak_didik.*');
        $this->db->limit(3);
        $this->db->order_by('id_anak_didik', 'DESC');
        return $this->db->get('anak_didik')->result();
    }

    public function showAnakDidikOne($id_anak_didik)
    {
        $this->db->select('anak_didik.*, user.name');
        $this->db->join('user', 'anak_didik.id_user = user.id_user');
        $this->db->where('id_anak_didik', $id_anak_didik);
        return $this->db->get('anak_didik')->result();
    }


    public function addAnakDidik($upload)
    {
        $data = [
            'id_anak_didik' => $this->input->post('anak_didik', true),
            'id_user' => $this->input->post('id_user', true),
            'nama' => $this->input->post('nama', true),
            'nama_wali' => $this->input->post('nama_wali', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'foto' => $upload['file']['file_name'],
        ];
        $this->db->insert('anak_didik', $data);
    }

    public function upload()
    {
        $config['upload_path'] = './assets/images/anak_didik';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name']  = $this->input->post('nama');
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function getAnakDidikHapus($id_anak_didik)
    {
        return $this->db->get_where('anak_didik', ['id_anak_didik' => $id_anak_didik])->row();
    }

    public function deleteAnakDidik($id_anak_didik)
    {
        $this->_deleteImage($id_anak_didik);
        $this->db->where('id_anak_didik', $id_anak_didik);
        $this->db->delete('anak_didik');
    }

    private function _deleteImage($id_anak_didik)
    {
        $anak_didik = $this->getAnakDidikHapus($id_anak_didik);
        $filename = $anak_didik->foto;
        unlink(FCPATH . "assets/images/anak_didik/" . $filename);
    }

    // public function getAnakDidik($id_anak_didik)
    // {
    //     return $this->db->get_where('anak_didik', ['id_anak_didik' => $id_anak_didik])->row();
    // }


}