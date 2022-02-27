<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
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
        if ($this->session->userdata('user_data')) {
            $google = $this->session->userdata('user_data');
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
        } else {
            $usergoogle = '';
        }

        $data = [
            "title" => "A3MALL | Brand " . ucwords($this->uri->segment(2)),
            "page" => "user/brand/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "branddetail" => $this->db->get_where('brand_product', array('name_brand' => $this->uri->segment(2)))->row_array(),
            "productbrand" => $this->brand->getProductBrand($this->uri->segment(2))->result_array(),
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function detailBlog()
    {
        if ($this->session->userdata('user_data')) {
            $google = $this->session->userdata('user_data');
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
        } else {
            $usergoogle = '';
        }


        $data = [
            "title" => "A3MALL | Detail Blog",
            "page" => "user/blog/detail",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "detailblog" => $this->blog->getBlogWhere($this->uri->segment(3))->row_array(),
            "sejenis" => $this->blog->getBlogSejenis($this->uri->segment(3))->result_array(),
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
