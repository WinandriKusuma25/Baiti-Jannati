<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksitransfermanual_model extends CI_Model
{

    public function showTransaksiTransferAll()
    {

        $this->db->select('bank_transfer.*, user.*, bank.*');
        $this->db->join('bank', 'bank_transfer.id_bank = bank.id_bank');
        $this->db->join('user', 'bank_transfer.id_user = user.id_user');
        $this->db->order_by('id_transfer', 'DESC');
        return $this->db->get_where('bank_transfer')->result();
    }

    public function getTransaksiTransferManualDetail($id_transfer)
    {
        $this->db->select('bank_transfer.*, user.*, bank.*');
        $this->db->join('bank', 'bank_transfer.id_bank = bank.id_bank');
        $this->db->join('user', 'bank_transfer.id_user = user.id_user');
        return $this->db->get_where('bank_transfer', ['id_transfer' => $id_transfer])->result();
    }

    public function showTransaksiTransferUser($email)
    {

        $this->db->select('bank_transfer.*, user.*, bank.*');
        $this->db->join('bank', 'bank_transfer.id_bank = bank.id_bank');
        $this->db->join('user', 'bank_transfer.id_user = user.id_user');
        $this->db->order_by('id_transfer', 'DESC');
        return $this->db->get_where('bank_transfer', ['email' => $email])->result();
    }

    public function getTransaksi($id_transfer)
    {
        $this->db->select('bank_transfer.*, user.*, bank.*');
        $this->db->join('bank', 'bank_transfer.id_bank = bank.id_bank');
        $this->db->join('user', 'bank_transfer.id_user = user.id_user');
        return $this->db->get_where('bank_transfer', ['id_transfer' => $id_transfer])->result();
    }

  
    
    public function addTransaksiManual($upload)
    {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'nominal' => $this->input->post('nominal', true),
            'bank' => $this->input->post('bank', true),
            'no_rekening' => $this->input->post('no_rekening', true),
            'id_bank' => $this->input->post('id_bank', true),
            'keterangan' => $this->input->post('keterangan', true),
            'bukti' => $upload['file']['file_name'],
            'status' => 'diproses',
        ];
        $this->db->insert('bank_transfer', $data);
    }

    public function upload()
    {
        $config['upload_path'] = './assets/images/bukti';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('bukti')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function hapus($id_transfer)
    {
        $this->db->where('id_transfer', $id_transfer);
        if (
            $this->db->delete('bank_transfer')
        ) {
            return true;
        } else {
            return false;
        }
    }

}