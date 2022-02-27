<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Catalogue extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
    }

    public function index()
    {
        if ($this->session->userdata('user_data')) {
            $google = $this->session->userdata('user_data');
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
        } else {
            $usergoogle = '';
        }

        $data = [
            "title" => "A3MALL | Catalog",
            "page" => "user/catalogue/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "catalogue" => $this->db->get('catalogue')->result_array(),
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function detailCatalogue()
    {
        if ($this->session->userdata('user_data')) {
            $google = $this->session->userdata('user_data');
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
        } else {
            $usergoogle = '';
        }


        $data = [
            "title" => "A3MALL | Detail Catalogue",
            "page" => "user/catalogue/detail",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "detailcatalogue" => $this->db->get_where('detail_catalogue', array('slug_catalogue' => $this->uri->segment(3)))->result_array(),
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
