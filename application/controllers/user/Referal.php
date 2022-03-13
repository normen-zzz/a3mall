<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Referal extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
        $this->load->model('User_model', 'user');
        $this->load->model('Referal_model', 'referal');
    }

    public function index($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $userreferal = $this->referal->getCustomerOnReferal($usergoogle['referal'])->result_array();
            $referal = $usergoogle['referal'];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $userreferal = $this->referal->getCustomerOnReferal($user['referal'])->result_array();
            $referal = $user['referal'];
        }

        $data = [
            "title" => "A3MALL | Referal",
            "page" => "user/referal/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "userreferal" => $userreferal,
            "referal" => $referal,
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
