<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function getUser($email)
    {
        $this->db->select('user.*');
        return $this->db->get_where('user', ['email' => $email])->result();
    }

    public function tampilUserSaja()
    {
        $usersaja = 'donatur';
        $query = $this->db->order_by('id_user', 'DESC')->get_where('user', array('role' => $usersaja));
        return $query->result();
    }

    public function showUser()
    {
        return $this->db->get('user')->result();
    }

    public function tambahUser()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'name' => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'image' => 'default.png',
            'role' => 'donatur',
            'is_active' => 'aktif',
            'date_created' => time(),
        ];
        $this->db->insert('user', $data);
    }

    public function ubahUser()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'is_active' => $this->input->post('is_active', true),
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }
}