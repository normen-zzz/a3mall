<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model', 'barang');
		$this->load->model('Blog_model', 'blog');
		$this->load->model('Cms_model', 'cms');
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
			"title" => "A3MALL | Dashboard",
			"page" => "user/dashboard",
			"user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			"usergoogle" => $usergoogle,
			"springbed" => $this->barang->getNewArrival(1),
			"sofa" => $this->barang->getNewArrival(2),
			"blog" => $this->blog->getBlog()->result_array(),
			"brand" => $this->db->get('brand_product')->result_array(),
			"carousel" => $this->cms->getCarousel()->result_array(),
		];

		$this->load->view('user/templates/app', $data, FALSE);
	}
}

/* End of file Dashboard.php */
