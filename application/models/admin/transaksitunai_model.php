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


        $config['upload_path']          = './assets/images/donasi_non_keuangan/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 5000; // mb


        $this->load->library('upload', $config);




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
        $urutan_foto = 0;
        for ( $i = 0; $i < count($jenis); $i++ ) {


            $gambar = null;
            //pengecekan apakah jenis non keuangan

            if ( $jenis[$i] == "Non Keuangan" ) {

                $files = $_FILES['foto'];
            
                $_FILES['foto[]']['name'] = $files['name'][$urutan_foto];
                $_FILES['foto[]']['type'] = $files['type'][$urutan_foto];
                $_FILES['foto[]']['tmp_name'] = $files['tmp_name'][$urutan_foto];
                $_FILES['foto[]']['error'] = $files['error'][$urutan_foto];
                $_FILES['foto[]']['size'] = $files['size'][$urutan_foto];

                if ( $this->upload->do_upload('foto[]') ) {

                    $gambar = $this->upload->data('file_name');
                } else {

                    $gambar = null;
                }

                $urutan_foto++;
            }   


            // push  
            array_push( $detail_donasi_tunai, array(

                'id_donasi'     => $id_donasi_terakhir,
                'id_kategori'   => $kategori[$i],
                'jenis_donasi'  => $jenis[$i],
                'nominal'   => $nominal[$i],
                'jumlah'    => $jumlah[$i],
                'image'     => $gambar,
                'keterangan' => $keterangan[$i]
            ) );
        } 


        // insert batch
        $this->db->insert_batch('detail_donasi_tunai', $detail_donasi_tunai);
   
    }



    public function showDonasiTransaksiTunaiKeuangan()
    {

        $this->db->select('transaksi_donasi_tunai.*,  user.name as id_user, user2.name as id_user_pengurus, detail_donasi_tunai.*,');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('user as user2', 'transaksi_donasi_tunai.id_user_pengurus = user2.id_user');
        $this->db->join('detail_donasi_tunai', 'transaksi_donasi_tunai.id_donasi = detail_donasi_tunai.id_donasi');
        return $this->db->get_where('transaksi_donasi_tunai', ['jenis_donasi' => 'keuangan' ])->result();
    }

    public function showDonasiTransaksiTunaiNonKeuangan()
    {

        $this->db->select('transaksi_donasi_tunai.*,  user.name as id_user, user2.name as id_user_pengurus, detail_donasi_tunai.*');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('user as user2', 'transaksi_donasi_tunai.id_user_pengurus = user2.id_user');
        // $this->db->join('kategori', 'detail_donasi_tunai.id_kategori = kategori.id_kategori');
        $this->db->join('detail_donasi_tunai', 'transaksi_donasi_tunai.id_donasi = detail_donasi_tunai.id_donasi');
        return $this->db->get_where('transaksi_donasi_tunai', ['jenis_donasi' => 'non keuangan' ])->result();
    }

    public function showTransaksiTunaiLimit()
    {

        $this->db->select('transaksi_donasi_tunai.*,  user.name as id_user, user2.name as id_user_pengurus, detail_donasi_tunai.*,');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('user as user2', 'transaksi_donasi_tunai.id_user_pengurus = user2.id_user');
        $this->db->join('detail_donasi_tunai', 'transaksi_donasi_tunai.id_donasi = detail_donasi_tunai.id_donasi');
        $this->db->limit(5);
        return $this->db->get_where('transaksi_donasi_tunai')->result();
    }

    public function getDonasiTransaksiTunaiKategori()
    {
        $this->db->select('detail_donasi_tunai.*, kategori.nama_kategori');
        $this->db->join('kategori', 'detail_donasi_tunai.id_kategori = kategori.id_kategori');
        return $this->db->get('detail_donasi_tunai')->result();
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
        $this->db->select_sum('nominal');
        return $this->db->get('detail_donasi_tunai')->result();
    }


    // 123
    public function countHari()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM transaksi_donasi_tunai  where  
        DAY(tgl_donasi) = DAY(NOW()) ");
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
        $query = $this->db->query("SELECT * FROM detail_donasi_tunai INNER JOIN transaksi_donasi_tunai ON detail_donasi_tunai.id_donasi = transaksi_donasi_tunai.id_donasi  where DAY(tgl_donasi) = DAY(NOW()) ");
        return $query->result();
    }

    public function nominalBulan()
    {
        $query = $this->db->query("SELECT * FROM detail_donasi_tunai INNER JOIN transaksi_donasi_tunai ON detail_donasi_tunai.id_donasi = transaksi_donasi_tunai.id_donasi where 
            MONTH(tgl_donasi) = MONTH(NOW())");
        return $query->result();
    }

    public function nominalTahun()
    {
        $query = $this->db->query("SELECT * FROM detail_donasi_tunai INNER JOIN transaksi_donasi_tunai ON detail_donasi_tunai.id_donasi = transaksi_donasi_tunai.id_donasi where 
            YEAR(tgl_donasi) = YEAR(NOW())");
        return $query->result();
    }

    public function gettahun(){
        $query = $this->db->query("SELECT YEAR(tgl_donasi) AS tahun FROM 
            transaksi_donasi_tunai  GROUP BY YEAR(tgl_donasi) ORDER BY YEAR(tgl_donasi)
            ASC");
        return $query->result();
    }

    public function filterbytahun($tahun2){
        $query = $this->db->query("SELECT * FROM detail_donasi_tunai  INNER JOIN transaksi_donasi_tunai ON detail_donasi_tunai.id_donasi = transaksi_donasi_tunai.id_user WHERE  YEAR(tgl_donasi) = 
            '$tahun2' ORDER BY tgl_donasi ASC");
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
    
        $this->db->select('transaksi_donasi_tunai.*, user.name as id_user, user2.name as id_user_pengurus');
        $this->db->join('user', 'transaksi_donasi_tunai.id_user = user.id_user');
        $this->db->join('user as user2', 'transaksi_donasi_tunai.id_user_pengurus = user2.id_user');
        $this->db->order_by('tgl_donasi', "DESC");
    
        if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null) {
            $this->db->where("DATE(transaksi_donasi_tunai.tgl_donasi) BETWEEN ' $stSession 'AND' $enSession'");
        } else {
            $this->db->where("transaksi_donasi_tunai.tgl_donasi BETWEEN '$start 'AND' $end'");
        }
         return $this->db->get('transaksi_donasi_tunai')->result();
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
        $this->db->select('detail_donasi_tunai.*, kategori.nama_kategori');
        $this->db->join('kategori', 'detail_donasi_tunai.id_kategori = kategori.id_kategori');
        return $this->db->get_where('detail_donasi_tunai', ['id_detail_donasi' => $id_detail_donasi])->result();
    }

    // hapus data donasi
    function onDelete( $id_donasi ) {

        // child
        $this->db->where('id_donasi', $id_donasi)->delete('detail_donasi_tunai');

        // parent
        $this->db->where('id_donasi', $id_donasi)->delete('transaksi_donasi_tunai');
    }



}