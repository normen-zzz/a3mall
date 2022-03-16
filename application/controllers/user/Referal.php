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
            $referalbe = $this->referal->getReferalEmail($google['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $referalbe = $this->referal->getReferalEmail($user['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
        }


        if ($referalbe->level_referal != 3) {
            redirect('Dashboard');
        }

        if ($this->referal->getNpwpBe($referalbe->users_email_referal)->num_rows() != 0) {
            $npwp = $this->referal->getNpwpBe($referalbe->users_email_referal)->row();
        } else {
            $npwp = FALSE;
        }

        $data = [
            "title" => "A3MALL | Referal",
            "page" => "user/referal/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "userreferal" => $userreferal,
            "referal" => $referalbe->code_referal,
            "npwp" => $npwp,
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function income($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $referalbe = $this->referal->getReferalEmail($google['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $referalbe = $this->referal->getReferalEmail($user['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
        }


        if ($referalbe->level_referal != 3) {
            redirect('Dashboard');
        }

        if ($this->referal->getNpwpBe($referalbe->users_email_referal)->num_rows() != 0) {
            $npwp = $this->referal->getNpwpBe($referalbe->users_email_referal)->row();
        } else {
            $npwp = FALSE;
        }

        $data = [
            "title" => "A3MALL | Referal",
            "page" => "user/referal/income",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "income" => $this->referal->getIncomeReferal($this->uri->segment(3))->result_array(),
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function addNpwp()
    {
        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $data = [
                'npwp' => $this->input->post('npwp'),
                'email_npwp' => $usergoogle['email']
            ];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data = [
                'npwp' => $this->input->post('npwp'),
                'email_npwp' => $user['email']
            ];
        }
        $this->db->insert('npwp_be', $data);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Npwp Berhasil Ditambahkan!", "success");');

        redirect('Referal');
    }
}

/* End of file Dashboard.php */
