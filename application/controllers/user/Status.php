<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
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
                $unpaid = false;
                $paid = false;
                $onprogress = false;
                $done = false;
                $alamatongkir = false;
                $transaksi = false;
            } else {
                $alamat = $this->user->getAlamatByEmail($google['email'])->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
                $unpaid = $this->transaksi->getDetailTransactionByUserUnpaid($google['email'])->result_array();
                $paid = $this->transaksi->getDetailTransactionByUserPaid($google['email'])->result_array();
                $onprogress = $this->transaksi->getDetailTransactionByUserOnProgress($google['email'])->result_array();
                $done = $this->transaksi->getDetailTransactionByUserDone($google['email'])->result_array();
                $transaksi = $this->transaksi->getTransactionByDetailTransaction($google['email'])->result_array();
            }
        } else {
            $usergoogle = '';
            $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'));
            if (!$alamat->num_rows()) {
                $alamat = '';
                $unpaid = false;
                $paid = false;
                $onprogress = false;
                $done = false;
                $alamatongkir = false;
                $transaksi = false;
            } else {
                $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'))->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
                $unpaid = $this->transaksi->getDetailTransactionByUserUnpaid($this->session->userdata('email'))->result_array();
                $paid = $this->transaksi->getDetailTransactionByUserPaid($this->session->userdata('email'))->result_array();
                $onprogress = $this->transaksi->getDetailTransactionByUserOnProgress($this->session->userdata('email'))->result_array();
                $done = $this->transaksi->getDetailTransactionByUserDone($this->session->userdata('email'))->result_array();
                $transaksi = $this->transaksi->getTransactionByDetailTransaction($this->session->userdata('email'))->result_array();
            }
        }
        $data = [
            "title" => "A3MALL | Status Pesanan",
            "page" => "user/transaction/status/status",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "alamat" => $alamat,
            "unpaid" => $unpaid,
            "paid" => $paid,
            "onprogress" => $onprogress,
            "done" => $done,
            "transaksi" => $transaksi,
            "alamatongkir" => $alamatongkir,

        ];
        // foreach ($detailtransaksi as $detail) {
        //     // $transaksi = $this->transaksi->getTransactionByDetailTransaction($detail['kd_transaction'])->result_array();
        //     // $status = $detail['status'];
        // }


        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function detail()
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
            "title" => "A3MALL | Detail Status Pesanan",
            "page" => "user/transaction/status/detail",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "alamat" => $alamat,
            "transaksi" => $this->transaksi->getTransactionCheckout($this->uri->segment(3))->result(),
            "detail_transaksi" => $this->transaksi->getDetailTransactionCheckout($this->uri->segment(3))->row_array(),
            "alamatongkir" => $alamatongkir

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
