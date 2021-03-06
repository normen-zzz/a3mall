<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT, GET, POST");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $params = array('server_key' => 'SB-Mid-server-DW_Jq25ASVx6aXW_cW7o3Ogc', 'production' => false);
        $this->load->library('form_validation');
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->model('Barang_model', 'barang');
        $this->load->model('User_model', 'user');
        $this->load->model('Ongkir_model', 'ongkir');
        $this->load->model('Transaksi_model', 'transaksi');
        if (!$this->session->userdata('user_data') && !$this->session->userdata('email')) {
            redirect('Login');
        }
    }

    public function index()
    {
        if ($this->session->userdata('user_data')) {
            $google = $this->session->userdata('user_data');
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $alamat = $this->user->getAlamatByEmail($google['email']);
            if (!$alamat->num_rows()) {
                $alamat = '';
            } else {
                $alamat = $this->user->getAlamatByEmail($google['email'])->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
            }
        } else {
            $usergoogle = '';
            $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'));
            if (!$alamat->num_rows()) {
                $alamat = '';
            } else {
                $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'))->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
            }
        }

        $data = [
            "title" => "A3MALL | Checkout",
            "page" => "user/transaction/checkout/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "alamat" => $alamat,
            "transaksi" => $this->transaksi->getTransactionCheckout($this->uri->segment(2))->result(),
            "detail_transaksi" => $this->transaksi->getDetailTransactionCheckout($this->uri->segment(2))->row_array(),
            "alamatongkir" => $alamatongkir

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function addToCheckout()
    {
        $keranjang = $this->cart->contents();

        if ($this->session->userdata['user_data']) {
            $google = $this->session->userdata('user_data');
            $user = $google['email'];
        } else {
            $user = $this->session->userdata('email');
        }

        $kode_transaksi = strtoupper(random_string('alnum', 6));
        $alamat = $this->user->getAlamatByEmail($user)->row_array();
        $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
        $alamatongkir = $getAlamat->rajaongkir->results;
        $ongkir = 0;
        foreach ($keranjang as $keranjang) {
            $getHarga =  $this->ongkir->getHargaOngkir($alamat['kecamatan_alamat'], $keranjang['weight']);
            $harga = $getHarga->rajaongkir->results;
            $data = [
                'kd_transaction' => $kode_transaksi,
                'users' => $user,
                'code_product' => $keranjang['kd_product'],
                'variation' => $keranjang['id'],
                'price' => $keranjang['price'],
                'quantity' => $keranjang['qty'],
                'total_price' => $keranjang['price'] * $keranjang['qty'],
                'date_transaction' => date('Y-m-d H:i:s'),
                'ongkir' => $harga[0]->costs[1]->cost[0]->value
            ];

            $ongkir += $data['ongkir'];
            $this->db->insert('transaction', $data);
        }


        $detail = [
            'kd_transaction' => $kode_transaksi,
            'email_users' => $user,
            'name_customers' => $alamat['nama_alamat'],
            'telp_customers' => $alamat['telp_alamat'],
            'address_customers' =>  $alamat['detail_alamat'] . '-' .  $alamatongkir->subdistrict_name . ' ,' . $alamatongkir->city . ' ,' . $alamatongkir->province . ' ID ' . $alamat['pos_alamat'],
            'date_transaction' => date('Y-m-d H:i:s'),
            'total_transaction' => $this->cart->total() + $ongkir,
            'total_quantity' => $this->cart->total_items(),
            'status' => 1
        ];
        $this->db->insert('detail_transaction', $detail);
        $this->cart->destroy();
        redirect('Checkout/' . $kode_transaksi);
    }

    public function getProvinceOngkir()
    {
        $this->load->model('Ongkir_model', 'ongkir');

        $getProvince = $this->ongkir->getProvinceOngkir();
        $province = $getProvince->rajaongkir->results;
        $output = '<option value="">-- Pilih Kecamatan --</option>';
        foreach ($province as $province) {
            $output .= '<option value="' . $province->province_id . '">' . $province->province . '</option>';
        }

        return $output;
    }

    public function getCityOngkir()
    {
        $this->load->model('Ongkir_model', 'ongkir');
        if ($this->input->post('provinsi_id')) {
            echo $this->ongkir->getCity($this->input->post('provinsi_id'));
        }
    }

    public function getSubDistrictOngkir()
    {
        $this->load->model('Ongkir_model', 'ongkir');
        if ($this->input->post('kabupaten_id')) {
            echo $this->ongkir->getSubDistrict($this->input->post('kabupaten_id'));
        }
    }

    public function token()
    {
        $nama = $this->input->post('nama');
        $jumlah = $this->input->post('jumlah');
        $kd_transaction = $this->input->post('kd_transaction');



        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $jumlah, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => $jumlah,
            'quantity' => 1,
            'name' => "pembayaran Transaksi " . strtok($nama, " ") . " Kode Transaksi " . $kd_transaction
        );

        // Optional
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

        // // Optional
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
            'first_name'    => strtok($nama, " "),
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 7
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
        $result = json_decode($this->input->post('result_data'), TRUE);
        $jumlah = $this->input->post('jumlah');
        // $id = $this->input->post('id');
        // $bulan = $this->input->post('bulan1');
        // echo 'RESULT <br><pre>';

        // echo '</pre>' ;
        // print_r($_POST);


        if (empty($result['va_numbers'])) {
            $bank = '';
            $vanumber = '';
            $pdf = '';
        } else {
            $bank = $result['va_numbers'][0]["bank"];
            $vanumber = $result['va_numbers'][0]["va_number"];
            $pdf = $result['pdf_url'];
        }


        $data = [
            'kd_transaction' => $_POST['kd_transaction'],
            'order_id' => $result['order_id'],
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'bank' => $bank,
            'va_number' => $vanumber,
            'pdf_url' => $pdf,
            'status_code' => $result['status_code']
        ];

        $simpan = $this->db->insert('midtrans', $data);
        $this->db->update('detail_transaction', array('order_id' => $result['order_id']), array('kd_transaction' => $_POST['kd_transaction']));
        if ($simpan) {
            $this->session->set_flashdata('success', 'Berhasil!');
            redirect(base_url('Status'));
            // var_dump($result);
        } else {
            $this->session->set_flashdata('gagal', 'Gagal!');
            redirect(base_url('Status'));
            // var_dump($result);
        }
    }
}

/* End of file Dashboard.php */
