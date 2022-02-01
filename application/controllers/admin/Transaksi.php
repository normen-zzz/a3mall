<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Transaksi_model', 'transaksi');
        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect('Admin/auth');
        }
    }

    public function unPaid()
    {
        $data = [
            "title" => "Pesanan Belum Bayar",
            "page" => "admin/transaksi/belumbayar/index",
            "transaksi" => $this->transaksi->getTransaksi("1")
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    public function paid()
    {
        $data = [
            "title" => "Pesanan Sudah Bayar",
            "page" => "admin/transaksi/sudahbayar/index",
            "transaksi" => $this->transaksi->getTransaksi("2")
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    public function onProgress()
    {
        $data = [
            "title" => "Pesanan Terkonfirmasi",
            "page" => "admin/transaksi/onprogress/index",
            "transaksi" => $this->transaksi->getTransaksi("3")
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    public function done()
    {
        $data = [
            "title" => "Pesanan Selesai",
            "page" => "admin/transaksi/done/index",
            "transaksi" => $this->transaksi->getTransaksi("4")
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    public function updateTransaction($code)

    {
        $detail = $this->transaksi->getDetailTransactionWhereCode($code);
        $data = [
            "status" => $detail->status + 1
        ];

        $this->transaksi->updateStatus($data, $code);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteTransaction($code)
    {
        $this->db->delete('detail_transaction', array('kd_transaction' => $code));
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file Dashboard.php */
