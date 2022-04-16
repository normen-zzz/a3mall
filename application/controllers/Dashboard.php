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
		$this->load->model('Popup_model', 'popup');
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
			"title" => "Springbed dan Sofa Berkualitas dengan kenyamanan yang terbaik",
			"page" => "user/dashboard",
			"user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			"usergoogle" => $usergoogle,
			"springbed" => $this->barang->getNewArrival(1),
			"sofa" => $this->barang->getNewArrival(2),
			"blog" => $this->blog->getBlog()->result_array(),
			"brand" => $this->db->get('brand_product')->result_array(),
			"carousel" => $this->cms->getCarousel()->result_array(),
			"popup" => $this->popup->getPopup()->row(),
		];
		$ip    = $this->input->ip_address(); // Mendapatkan IP user
		$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
		$waktu = time(); //
		$timeinsert = date("Y-m-d H:i:s");

		// Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
		$s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
		$ss = isset($s) ? ($s) : 0;


		// Kalau belum ada, simpan data user tersebut ke database
		if ($ss == 0) {
			$this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
		}

		// Jika sudah ada, update
		else {
			$this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
		}


		$pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung

		$dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();

		$totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung

		$bataswaktu = time() - 300;

		$pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online


		$data['pengunjunghariini'] = $pengunjunghariini;
		$data['totalpengunjung'] = $totalpengunjung;
		$data['pengunjungonline'] = $pengunjungonline;

		$this->load->view('user/templates/app', $data, FALSE);
	}
}

/* End of file Dashboard.php */
