<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
        // if (!$this->ion_auth->is_admin())
        // {
        //   $this->session->set_flashdata('message', 'You must be an admin to view this page');
        //   redirect('dashboard');
        // }
    }

    public function springbed()
    {
        $data = [
            "title" => "Data Spring Bed",
            "page" => "admin/barang/springbed/index",
            "barang" => $this->barang->getProductByCategory('product', '1')
        ];

        $this->load->view('admin/templates/app', $data);
    }

    public function sofa()
    {
        $data = [
            "title" => "Data Sofa",
            "page" => "admin/barang/sofa/index",
            "barang" => $this->barang->getProductByCategory('product', '2')
        ];

        $this->load->view('admin/templates/app', $data);
    }

    public function unitProduct($code)
    {
        $product = $this->db->get_where('product', array('kd_product' => $code))->row();
        $data = [
            "title" => "Data Unit " . $product->name_product,
            "page" => "admin/barang/unit/index",
            "unit" => $this->barang->getUnitByCodeProduct($code),
        ];

        $this->load->view('admin/templates/app', $data);
    }
}

/* End of file Dashboard.php */
