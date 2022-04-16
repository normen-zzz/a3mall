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
        $this->load->model('User_model', 'user');
        $this->load->model('Referal_model', 'referal');
        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect('Admin/auth');
        }
    }

    public function unPaid()
    {
        $data = [
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "title" => "Pesanan Belum Bayar",
            "page" => "admin/transaksi/belumbayar/index",
            "transaksi" => $this->transaksi->getTransaksi("1")
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    public function paid()
    {
        $data = [
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "title" => "Pesanan Sudah Bayar",
            "page" => "admin/transaksi/sudahbayar/index",
            "transaksi" => $this->transaksi->getTransaksi("2")
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    public function onProgress()
    {
        $data = [
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "title" => "Pesanan Terkonfirmasi",
            "page" => "admin/transaksi/onprogress/index",
            "transaksi" => $this->transaksi->getTransaksi("3")
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    public function done()
    {
        $data = [
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "title" => "Pesanan Selesai",
            "page" => "admin/transaksi/done/index",
            "transaksi" => $this->transaksi->getTransaksi("4")
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    public function updateTransaction($code)

    {
        $detail = $this->transaksi->getDetailTransactionWhereCode($code);
        $user = $this->user->getProfileAjax($detail->email_users);
        $referal = $this->referal->getReferal($user->referal)->row();
        $businessEx = $this->referal->getBusinessEx($referal->users_email_referal)->row();
        $transaction = $this->db->get_where('transaction', array('kd_transaction' => $detail->kd_transaction))->result();
        $data = [
            "status" => $detail->status + 1
        ];

        if ($data['status'] == 4) {
            if ($referal->level_referal == 3) { //jika customer menggunakan code referral maka ada income 1% masuk ke BE
                $income = [
                    'referal' => $referal->code_referal,
                    'kd_transaction' => $detail->kd_transaction,
                    'income' => (($detail->total_transaction - $detail->ongkir)) * 0.01,
                    'total_income' => ((($detail->total_transaction - $detail->ongkir)) * 0.01),
                    'date_income' => date("Y-m-d H:i:s")
                ];

                $cashback_user = [
                    'kd_transaction' => $detail->kd_transaction,
                    'total_transaction' => $detail->total_transaction,
                    'total_cashback' => (($detail->total_transaction - $detail->ongkir)) * 0.02,
                    'is_referal' => 1

                ];

                $this->db->insert('income_referal', $income);
                $this->db->insert('cashback_user', $cashback_user);

                $this->db->update('users', array('saldo' => $businessEx->saldo + $income['total_income']), array('email' => $referal->users_email_referal)); //Update Saldo Be
                $this->db->update('users', array('saldo' => ($user->saldo) + (($detail->total_transaction - $detail->ongkir)) * 0.02), array('email' => $detail->email_users)); //Update Saldo User Referal dengan menambahkan 2%
            } else {
                $cashback_user = [
                    'kd_transaction' => $detail->kd_transaction,
                    'total_transaction' => $detail->total_transaction,
                    'total_cashback' => (($detail->total_transaction - $detail->ongkir)) * 0.01,
                    'is_referal' => 0

                ];
                $this->db->insert('cashback_user', $cashback_user);
                $this->db->update('users', array('saldo' => ($user->saldo) + (($detail->total_transaction - $detail->ongkir)) * 0.01), array('email' => $detail->email_users)); //Update Saldo User Default
            }
            if ($user->group == 5) { //Jika Yang memesan BE sendiri maka akan mendapatkan 3%
                $incomeorder = [
                    'kd_transaction' => $detail->kd_transaction,
                    'email' => $user->email,
                    'total_transaction' => $detail->total_transaction - $detail->ongkir,
                    'income' => ($detail->total_transaction - $detail->ongkir) * 0.03,
                    'total_income' => ($detail->total_transaction - $detail->ongkir) * 0.03
                ];

                $this->db->insert('incomeorder_referal', $incomeorder);
                $this->db->update('users', array('saldo' => ($user->saldo) + ((($detail->total_transaction - $detail->ongkir) * 0.03))), array('email' => $user->email)); //Update Saldo BE + 3%
            }
        }
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
