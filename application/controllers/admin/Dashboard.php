<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library(['ion_auth', 'form_validation']);
        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect('admin/Auth');
        }
    }

    public function index()
    {
        $data = [
            "title" => "A3Mall|Dashboard",
            "page" => "admin/dashboard/dashboard"
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
