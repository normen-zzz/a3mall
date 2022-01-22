<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data = [
			"title" => "Dashboard",
			"page" => "user/dashboard",
			"user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
		];

		$this->load->view('user/templates/app', $data, FALSE);
	}
}

/* End of file Dashboard.php */
