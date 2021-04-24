<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{

    //menampilkan pengaturan
    public function showPengaturan()
    {
        $this->db->select('pengaturan.*, user.name');
        $this->db->join('user', 'pengaturan.id_user = user.id_user');
        return $this->db->get('pengaturan')->result();
    }

    
    public function getPengaturan($id_pengaturan)
    {
        $this->db->select('pengaturan.*, user.name');
        $this->db->join('user', 'pengaturan.id_user = user.id_user');
        return $this->db->get_where('pengaturan', ['id_pengaturan' => $id_pengaturan])->result();
    }

    public function addPengaturan($upload)
    {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'sejarah' => $this->input->post('sejarah', true),
            'kondisi' => $this->input->post('kondisi', true),
            'foto' => $upload['file']['file_name'],
            'mitra_berbagi' => $this->input->post('mitra_berbagi', true),
            'motivasi' => $this->input->post('motivasi', true),
        ];
        $this->db->insert('pengaturan', $data);
    }

    public function upload()
    {
        $config['upload_path'] = './assets/images/pengaturan';
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

    public function getpengaturanOne($id_pengaturan)
    {
        return $this->db->get_where('pengaturan', ['id_pengaturan' => $id_pengaturan])->row();
    }


    public function deletePengaturan($id_pengaturan)
    {
        $this->_deleteImage($id_pengaturan);
        $this->db->where('id_pengaturan', $id_pengaturan);
        $this->db->delete('pengaturan');
    }

    private function _deleteImage($id_pengaturan)
    {
        $pengaturan = $this->getpengaturanOne($id_pengaturan);
        $filename = $pengaturan->foto;
        unlink(FCPATH . "assets/images/pengaturan/" . $filename);
    }
}