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
}