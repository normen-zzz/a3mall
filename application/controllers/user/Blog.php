<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Blog_model', 'blog');
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
            "title" => "A3MALL | Blog",
            "page" => "user/blog/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "blog" => $this->blog->getBlog()->result_array(),
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
        $blog = $this->blog->getBlogWhere($this->uri->segment(3))->row_array();

        $data = [
            "title" => "A3MALL Blog | " . $blog['title_blog'],
            "page" => "user/blog/detail",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "detailblog" => $blog,
            "sejenis" => $this->blog->getBlogSejenis($this->uri->segment(3))->result_array(),
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
