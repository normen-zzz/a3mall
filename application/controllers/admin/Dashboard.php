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
            "title2" => "Dashboard",
            "page" => "admin/dashboard/dashboard",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
        ];
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung

        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();

        $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung

        $bataswaktu = time() - 300;

        $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online


        $data['pengunjunghariini'] = $pengunjunghariini;
        $data['totalpengunjung'] = $totalpengunjung;
        $data['pengunjungonline'] = $pengunjungonline;
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
        if ($user->group == 4) {
            redirect('admin/Referal');
        }

        $this->load->view('admin/templates/app', $data, FALSE);
    }
}

/* End of file Dashboard.php */
