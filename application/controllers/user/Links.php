<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Links extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Blog_model', 'blog');
        $this->load->model('Brand_model', 'brand');
    }

    public function index()
    {
        $this->load->view('user/links/index');
    }

}

/* End of file Dashboard.php */
