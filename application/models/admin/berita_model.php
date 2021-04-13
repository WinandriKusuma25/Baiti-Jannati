<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{

    //menampilkan berita
    public function showBerita()
    {
        $this->db->select('berita.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'berita.id_pengurus = pengurus.id_pengurus');
        return $this->db->get('berita')->result();
    }

    public function showBeritaPagination($limit, $start)
    {
        $this->db->select('berita.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'berita.id_pengurus = pengurus.id_pengurus');
        return $this->db->get('berita', $limit, $start)->result();
    }

    public function countAllBerita()
    {
        return $this->db->get('berita')->num_rows();
    }

    public function addBerita($upload)
    {
        $data = [
            'id_berita' => $this->input->post('id_berita', true),
            'id_pengurus' => $this->input->post('id_pengurus', true),
            'tgl_kegiatan' => $this->input->post('tgl_kegiatan', true),
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'foto' => $upload['file']['file_name'],
        ];
        $this->db->insert('berita', $data);
    }

    public function showBeritaTerbaru()
    {
        $this->db->select('berita.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'berita.id_pengurus = pengurus.id_pengurus');
        $this->db->limit(3);
        $this->db->order_by('id_berita', 'DESC');
        return $this->db->get('berita')->result();
    }


    public function getBerita($id_berita)
    {
        $this->db->select('berita.*, pengurus.nama_pengurus');
        $this->db->join('pengurus', 'berita.id_pengurus = pengurus.id_pengurus');
        return $this->db->get_where('berita', ['id_berita' => $id_berita])->result();
    }

    public function upload()
    {
        $config['upload_path'] = './assets/images/berita';
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

    public function getBeritaOne($id_berita)
    {
        return $this->db->get_where('berita', ['id_berita' => $id_berita])->row();
    }


    public function deleteBerita($id_berita)
    {
        $this->_deleteImage($id_berita);
        $this->db->where('id_berita', $id_berita);
        $this->db->delete('berita');
    }

    private function _deleteImage($id_berita)
    {
        $berita = $this->getBeritaOne($id_berita);
        $filename = $berita->foto;
        unlink(FCPATH . "assets/images/berita/" . $filename);
    }
}