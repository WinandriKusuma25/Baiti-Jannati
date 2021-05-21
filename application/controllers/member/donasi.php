<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-Ix2wrhyOtikDXGCL0xBTVEWo', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
        $this->load->model('admin/User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Donasi';
        $this->form_validation->set_rules('nominal', 'Password', 'required|trim', [
            'required' => 'nominal tidak boleh kosong !',
        ]);
        $data['user'] = $this->User_model->getUser($this->session->userdata('email'));
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/donasi/index', $data);
        $this->load->view('templates/member/footer');
    }

    public function token()
    {

        // $keterangan = $this->input->post();

        $nominal = $this->input->post('nominal');
        // $id_user =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result();
        $email = $this->session->userdata('email');
        $name =  $this->session->userdata('name');

        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $nominal, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => $nominal,
            'quantity' => 1,
            'name' => "Donasi Baiti Jannati"
        );

        // Optional
        // $item2_details = array(
        // 	'id' => 'a2',
        // 	'price' => 20000,
        // 	'quantity' => 2,
        // 	'name' => "Orange"
        // );

        // Optional
        // $item_details = array($item1_details, $item2_details);
        $item_details = array($item1_details);

        // Optional
        // $billing_address = array(
        //     'first_name'    => "Andri",
        //     'last_name'     => "Litani",
        //     'address'       => "Mangga 20",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16602",
        //     'phone'         => "081122334455",
        //     'country_code'  => 'IDN'
        // );

        // Optional
        // $shipping_address = array(
        //     'first_name'    => "Obet",
        //     'last_name'     => "Supriadi",
        //     'address'       => "Manggis 90",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16601",
        //     'phone'         => "08113366345",
        //     'country_code'  => 'IDN'
        // );

        // Optional
        $customer_details = array(
            'first_name'    => $name,
            // 'last_name'     => "Litani",
            'email'         => $email,
            // 'phone'         => "081122334455",
            // 'billing_address'  => $billing_address,
            // 'shipping_address' => $shipping_address
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'minute',
            'duration'  => 3600
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {

        // $result = json_decode($this->input->post('result_data'));
        // echo 'RESULT <br><pre>';
        // var_dump($result);
        // echo '</pre>';

        $result = json_decode($this->input->post('result_data'), true);

        $keterangan = $this->input->post('keterangan');
        $nama = $this->session->userdata('id_user');
        if ($result['payment_type'] == 'echannel'){
            $data = [
                'order_id' => $result['order_id'],
                'gross_amount' => $result['gross_amount'],
                'payment_type' => $result['payment_type'],
                'transaction_time' => $result['transaction_time'],
                // 'bank' => $result['va_numbers'][0]['bank'],
                // 'va_number' => $result['va_numbers'][0]['va_number'],
                'pdf_url' => $result['pdf_url'],
                'status_code' => $result['status_code'],
                'bill_key' => $result['bill_key'],
                'biller_code' => $result['biller_code'],
                'keterangan' => $keterangan,
                'id_user' => $nama
            ];
        }else{
            $data = [
                'order_id' => $result['order_id'],
                'gross_amount' => $result['gross_amount'],
                'payment_type' => $result['payment_type'],
                'transaction_time' => $result['transaction_time'],
                'bank' => $result['va_numbers'][0]['bank'],
                'va_number' => $result['va_numbers'][0]['va_number'],
                'pdf_url' => $result['pdf_url'],
                'status_code' => $result['status_code'],
                // 'bill_key' => $result['bill_key'],
                // 'biller_code' => $result['biller_code'],
                'keterangan' => $keterangan,
                'id_user' => $nama
            ];
        }
       
        $simpan = $this->db->insert('transaksi_midtrans', $data);
        if ($simpan) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Transaksi berhasil, Silahkan segera melakukan pembayaran ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('member/riwayat_donasi', 'refresh');
        } else {
            echo "gagal";
        }
    }
}