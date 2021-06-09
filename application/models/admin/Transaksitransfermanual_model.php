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

    public function showTransaksiSukses()
    {

        $this->db->select('bank_transfer.*, user.*, bank.*');
        $this->db->join('bank', 'bank_transfer.id_bank = bank.id_bank');
        $this->db->join('user', 'bank_transfer.id_user = user.id_user');
        return $this->db->get_where('bank_transfer', ['status' => 'diterima'])->result();
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
            'norekening' => $this->input->post('norekening', true),
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

    public function countHari()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM bank_transfer where  DAY(created_at) = DAY(NOW())    AND  status = 'diterima'
         ");
        return $query->row();
    }

    public function countBulan()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM bank_transfer where  
                MONTH(created_at) = MONTH(NOW())  AND  status = 'diterima'");
        return $query->row();
    }

    public function countTahun()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM bank_transfer where  
                YEAR(created_at) = YEAR(NOW())   AND  status = 'diterima'");
        return $query->row();
    }

    public function NominalAll()
    {
        $this->db->select_sum('nominal');
        return $this->db->get_where('bank_transfer', ['status' => 'diterima'])->result();
    }

    public function nominalHari()
    {
        $query = $this->db->query("SELECT * FROM bank_transfer where DAY(created_at) = DAY(NOW()) AND status = 'diterima'");
        return $query->result();
    }

    public function nominalBulan()
    {
        $query = $this->db->query("SELECT * FROM bank_transfer where 
        MONTH(created_at) = MONTH(NOW()) AND status = 'diterima'");
        return $query->result();
    }

    public function nominalTahun()
    {
        $query = $this->db->query("SELECT * FROM bank_transfer where 
            YEAR(created_at) = YEAR(NOW())  AND status = 'diterima'");
        return $query->result();
    }

    public function filter()
    {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        if ($this->session->userdata('startSession') == null && $this->session->userdata('endSession') == null) {
            $this->session->set_userdata('startSession', $start);
            $this->session->set_userdata('endSession', $end);
        } else if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null && $start != null && $end != null) {
            $this->session->set_userdata('startSession', $start);
            $this->session->set_userdata('endSession', $end);
        }
        $stSession = $this->session->userdata('startSession');
        $enSession =  $this->session->userdata('endSession');
        $this->db->select('*');
        $this->db->from('bank_transfer');
        $this->db->join('user', 'bank_transfer.id_user = user.id_user');
        $this->db->join('bank', 'bank_transfer.id_bank = bank.id_bank');
        $this->db->order_by('created_at', "asc");
        if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null) {
            $this->db->where("DATE(bank_transfer.created_at) BETWEEN ' $stSession 'AND' $enSession'");
        } else {
            $this->db->where("bank_transfer.created_at BETWEEN '$start 'AND' $end'");
        }
        return $this->db->get()->result();
    }

    public function ubahTransaksi()
    {
        $data = [
            'id_transfer' => $this->input->post('id_transfer', true),
            'status' => $this->input->post('status', true),
        ];
        $this->db->where('id_transfer', $this->input->post('id_transfer'));
        $this->db->update('bank_transfer', $data);
    }

}