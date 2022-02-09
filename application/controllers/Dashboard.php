<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
			"title" => "A3MALL | Belanja kebutuhan mu disini",
			"page" => "user/dashboard",
			"user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			"usergoogle" => $usergoogle,
			"springbed" => $this->barang->getNewArrival(1),
			"sofa" => $this->barang->getNewArrival(2),
		];

		$this->load->view('user/templates/app', $data, FALSE);
	}

	public function lokasi()
	{
		$data = [
			"title" => "A3MALL | Lokasi",
			"page" => "user/lokasi",
			"user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
		];

		$this->load->view('user/templates/app', $data, FALSE);
	}
}

/* End of file Dashboard.php */
