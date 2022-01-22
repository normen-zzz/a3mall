<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
    }

    public function index()
    {
        $data = [
            "title" => "Product",
            "page" => "user/product/index",
            "sofa" => $this->barang->getProductByCategory("2"),
            "springbed" => $this->barang->getProductByCategory("1")
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
