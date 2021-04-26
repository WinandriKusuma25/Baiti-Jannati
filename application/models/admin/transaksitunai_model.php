<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksitunai_model extends CI_Model
{



    // ambil kategori id yang bernilai uang
    function getDataKategoriByUang() {

        $where = ['nama_kategori' => "uang"];
        return $this->db->get_where('kategori', $where)->row();
    }


    // trial
    function onInsertDataTransaksi() {

        $donatur    = $this->input->post('id_user');
        
        // multiple data
        $jenis  = $this->input->post('jenis');
        $nominal   = $this->input->post('nominal');
        $keterangan= $this->input->post('keterangan');
        $kategori  = $this->input->post('kategori');
        $jumlah    = $this->input->post('jumlah');
        $image     = "";


        $transaksi_donasi = array(

            'id_user'           => $donatur,
            'id_user_pengurus'  => $this->session->userdata('id_user')
        );
        $this->db->insert('transaksi_donasi_tunai', $transaksi_donasi);
        // ambil nilai terakhir kali di masukkan ke dalam table
        $id_donasi_terakhir = $this->db->insert_id();





        $detail_donasi_tunai = array(); 
        for ( $i = 0; $i < count($jenis); $i++ ) {

            // push  
            array_push( $detail_donasi_tunai, array(

                'id_donasi'     => $id_donasi_terakhir,
                'id_kategori'   => $kategori[$i],
                'jenis_donasi'  => $jenis[$i],
                'nominal'   => $nominal[$i],
                'jumlah'    => $jumlah[$i],
                'image'     => null,
                'keterangan' => $keterangan[$i]
            ) );
        } 


        // insert batch
        $this->db->insert_batch('detail_donasi_tunai', $detail_donasi_tunai);
        
        redirect('admin/transaksi_tunai');
    }



    public function showDonasiTransaksiTunaiAll()
    {

        $this->db->select('transaksi_donasi_tunai.*, user.name, pengurus.nama_pengurus, detail_donasi_tunai.*');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('detail_donasi_tunai', 'transaksi_donasi_tunai.id_donasi = detail_donasi_tunai.id_donasi');
        return $this->db->get('transaksi_donasi_tunai')->result();
    }


    public function showDonasiTransaksiTunai()
    {

        $this->db->select('transaksi_donasi_tunai.*, user.name as id_user, user2.name as id_user_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('user as user2', 'transaksi_donasi_tunai.id_user_pengurus = user2.id_user');
        $this->db->order_by('tgl_donasi', 'DESC');
        return $this->db->get('transaksi_donasi_tunai')->result();
    }



    // public function getDonasiTransaksiTunai($id_detail_donasi)
    // {
    //     $this->db->select('transaksi_donasi_tunai.*, user.name, pengurus.nama_pengurus, detail_donasi_tunai.*');
    //     $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
    //     $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
    //     $this->db->join('transaksi_donasi_tunai', 'detail_donasi_tunai.id_donasi = transaksi_donasi_tunai.id_donasi');
    //     $this->db->where('detail_donasi_tunai.id_donasi', $id_detail_donasi);
    //     return $this->db->get('transaksi_donasi_tunai')->result();
    // }

    //untuk menampilkan data Detail Transaksi Tunai
    public function getDonasiTransaksiTunai($id)
    {
        $this->db->select('detail_donasi_tunai.*, user.name,  transaksi_donasi_tunai.*, kategori.nama_kategori');
        $this->db->join('transaksi_donasi_tunai', 'detail_donasi_tunai.id_donasi = transaksi_donasi_tunai.id_donasi');
        $this->db->join('kategori', 'detail_donasi_tunai.id_kategori = kategori.id_kategori');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->where('detail_donasi_tunai.id_donasi', $id);
        // $this->db->limit(1);
        return $this->db->get('detail_donasi_tunai')->result();
    }


    //untuk menampilkan data penerima donatur dan donatur
    public function getTransaksiTunaiUser($id)
    {
        $this->db->select('transaksi_donasi_tunai.*, user.name as id_user, user2.name as id_user_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('user as user2', 'transaksi_donasi_tunai.id_user_pengurus = user2.id_user');
        $this->db->where('id_donasi', $id);
        return $this->db->get('transaksi_donasi_tunai')->result();
    }

    // public function getTransaksiTunaiPengurus($id)
    // {
    //     $this->db->select('transaksi_donasi_tunai.*, user.*');
    //     $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
    //     $this->db->where('id_donasi', $id);
    //     return $this->db->get('transaksi_donasi_tunai')->result();
    // }

    public function getTransaksiTunaiTglDonasi($id)
    {
        $this->db->select('transaksi_donasi_tunai.tgl_donasi');
        $this->db->where('id_donasi', $id);
        return $this->db->get('transaksi_donasi_tunai')->result();
    }

    //model untuk member
    public function showDonasiTransaksiTunaiMember($email)
    {

        $this->db->select('transaksi_donasi_tunai.*, user.name');
        // $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        return $this->db->get_where('transaksi_donasi_tunai', ['email' => $email])->result();
    }

    public function NominalAll()
    {
        // $this->db->select_sum('nominal');
        return $this->db->get('transaksi_donasi_tunai')->result();
    }


    // 123
    public function countHari()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_donasi_tunai where tgl_donasi = CURDATE() 
         ");
        return $query->row();
    }

    public function countBulan()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_donasi_tunai where  
                MONTH(tgl_donasi) = MONTH(NOW())");
        return $query->row();
    }

    public function countTahun()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_donasi_tunai where  
                YEAR(tgl_donasi) = YEAR(NOW())");
        return $query->row();
    }

    public function nominalHari()
    {
        $query = $this->db->query("SELECT * FROM transaksi_donasi_tunai where tgl_donasi = CURDATE()");
        return $query->result();
    }

    public function nominalBulan()
    {
        $query = $this->db->query("SELECT * FROM transaksi_donasi_tunai where 
            MONTH(tgl_donasi) = MONTH(NOW())");
        return $query->result();
    }

    public function nominalTahun()
    {
        $query = $this->db->query("SELECT * FROM transaksi_donasi_tunai where 
            YEAR(tgl_donasi) = YEAR(NOW())");
        return $query->result();
    }


    // public function showTransaksiTunaiFilter($daterange)
    // {

    //     $this->db->select('transaksi_donasi_tunai.*, pengurus.nama_pengurus, user.*');
    //     $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
    //     $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
    //     $this->db->where('tgl_donasi >=', $daterange[0]);
    //     $this->db->where('tgl_donasi <=',  $daterange[1]);
    //     return $this->db->get('transaksi_donasi_tunai')->result();
    // }

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
        $this->db->from('transaksi_donasi_tunai');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('pengurus', 'transaksi_donasi_tunai.id_pengurus = pengurus.id_pengurus');
        $this->db->order_by('tgl_donasi', "asc");
        if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null) {
            $this->db->where("transaksi_donasi_tunai.tgl_donasi BETWEEN ' $stSession 'AND' $enSession'");
        } else {
            $this->db->where("transaksi_donasi_tunai.tgl_donasi BETWEEN '$start 'AND' $end'");
        }
        return $this->db->get()->result();
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function chartTransaksiDonasiTunai($bulan)
    {
        $like = 'T-TDT-' . date('y') . $bulan;
        $this->db->like('id_donasi', $like, 'after');
        return count($this->db->get('transaksi_donasi_tunai')->result_array());
    }

    public function getMonth()
    {
        $this->db->select('MONTHNAME(tgl_donasi) as month');
        $this->db->from('transaksi_donasi_tunai');
        $this->db->group_by('tgl_donasi');
        $this->db->order_by('id_pemasukan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getStatistics()
    {
        $this->db->select('SUM(IF(DAY(tgl_donasi)=(DAY(CURRENT_DATE()) -1), nominal, 0)) as lastDay,
        SUM(IF(DAY(tgl_donasi)=DAY(CURRENT_DATE()), nominal, 0)) as daily, 
        SUM(IF(MONTH(tgl_donasi)=(MONTH(CURRENT_DATE()) -1), nominal, 0)) as lastMonth,
        SUM(IF(MONTH(tgl_donasi)=MONTH(CURRENT_DATE()), nominal, 0)) as monthly, 
            COUNT(id_pemasukan) amount, SUM(nominal) nominal');
        $this->db->from('pemasukan_nontransaksi_donasi_tunai_donasi');
        return $this->db->get()->row_array();
    }

    public function nominalTerbesar()
    {

        $this->db->select_max('nominal');
        return $this->db->get('transaksi_donasi_tunai')->result();
    }

    
    public function getDetailTransaksiTunai($id_detail_donasi)
    {
        $this->db->select('detail_donasi_tunai.*');
        // $this->db->join('pengurus', 'berita.id_pengurus = pengurus.id_pengurus');
        return $this->db->get_where('detail_donasi_tunai', ['id_detail_donasi' => $id_detail_donasi])->result();
    }
}