<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function index()
	{
		$data = [
			"title" => "Dashboard",
			"page" => "user/dashboard"
		];

		$this->load->view('user/templates/app', $data, FALSE);
	}

}

/* End of file Dashboard.php */


