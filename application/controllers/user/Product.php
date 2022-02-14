<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data = [
            "title" => "A3MALL | Product",
            "page" => "user/product/index",
            "sofa" => $this->barang->getProductByCategoryJoinPhoto("2"),
            "springbed" => $this->barang->getProductByCategoryJoinPhoto("1"),
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "photo" => $this->barang->getPhoto()->result(),
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function deskripsi()
    {
        $produk = $this->barang->getProductBySlug($this->uri->segment(2));
        $data = [
            "title" => "A3MALL | Deskripsi",
            "page" => "user/product/deskripsi",
            "produk" => $this->barang->getProductBySlug($this->uri->segment(2)),
            "photo_produk" => $this->barang->getPhotoBarangBySlug($this->uri->segment(2)),
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "sejenis" => $this->barang->getSejenis($produk->brand_product, $this->uri->segment(2)),
            "variation" => $this->db->get_where('variation_product', array('kd_product' => $produk->kd_product))->result(),
            "unit" => $this->barang->getUnitByCodeProduct($produk->kd_product),
            "variationunit" => $this->barang->getVariationUnit(),
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
