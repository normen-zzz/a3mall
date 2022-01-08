<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
	
    public function index()
    {
		$data = [
			'title' => 'Halaman Login',
		];

		$this->load->view('admin/auth/login', $data, FALSE);
		
    }
}

/* End of file Auth.php and path /application/controllers/Auth.php */


