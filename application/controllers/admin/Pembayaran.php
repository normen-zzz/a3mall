<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library(['ion_auth', 'form_validation']);
        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect('admin/Auth');
        }
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index()
    {
        $data = [
            "title" => "A3Mall|Pembayaran",
            "page" => "admin/transaksi/midtrans/pembayaran",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "midtrans" => $this->transaksi->getAllMidtrans()->result_array()
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
