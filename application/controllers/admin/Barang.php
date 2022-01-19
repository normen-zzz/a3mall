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

    public function springbed($modal = "")
    {
        $data = [
            "title" => "Data Spring Bed",
            "title2" => "Spring Bed",
            "page" => "admin/barang/index",
            "barang" => $this->barang->getProductByCategory('product', '1'),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data);
    }

    public function sofa($modal = "")
    {
        $data = [
            "title" => "Data Sofa",
            "title2" => "Sofa",
            "page" => "admin/barang/index",
            "barang" => $this->barang->getProductByCategory('product', '2'),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data);
    }

    public function unitProduct($code, $modal = "")
    {
        $product = $this->db->get_where('product', array('kd_product' => $code))->row();
        $data = [
            "title" => "Data Unit " . $product->name_product,
            "page" => "admin/barang/unit/index",
            "unit" => $this->barang->getUnitByCodeProduct($code),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data);
    }

    public function addBarang()
    {

        $this->form_validation->set_rules('code', 'Code', 'required|trim|is_unique[product.kd_product]', [
            'required'  => 'Code tidak boleh kosong.',
            'is_unique' => 'Code sudah terdaftar.'
        ]);

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('price', 'Price', 'required', [
            'required' => 'Password tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('brand', 'Brand', 'required', [
            'required' => 'Brand tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('date', 'Date', 'required', [
            'required' => 'Date tidak boleh kosong.'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $jenis = $this->input->post('jenis');
            $this->$jenis("$('#tambahBarangModal').modal('show');");
        } else {
            $jenis = $this->input->post('jenis');
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $title = trim(strtolower($this->input->post('name')));
            $out = explode(" ", $title);
            $slug = implode("-", $out);
            $data = [
                'kd_product' => $this->input->post('code'),
                'name_product' => $this->input->post('name'),
                'slug_product' => $slug,
                'price_product' => preg_replace("/[^0-9]/", "", $this->input->post('price')),
                'describe_product' => $this->input->post('describe'),
                'brand_product' => $this->input->post('brand'),
                'category_product' => $this->input->post('category'),
                'users' => $user['id'],
                'date_arrived' => $this->input->post('date'),
            ];

            // if (isset($_FILES['photo']['name'])) {
            //     $config['upload_path']         = './images/users/';
            //     $config['allowed_types']     = 'gif|jpg|png|jpeg';
            //     $config['overwrite']          = true;

            //     $this->load->library('upload', $config);

            //     if (!$this->upload->do_upload('photo')) {
            //         $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');
            //         redirect('cuti/cuti_add');
            //     } else {
            //         $img = $this->upload->data();
            //         $data['photo'] = $img['file_name'];
            //     }
            // }

            $this->db->insert('product', $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Karyawan Berhasil Ditambahkan!", "success");');

            redirect('admin/barang/' . $jenis);
        }
    }

    public function addUnit()
    {

        $this->form_validation->set_rules('code', 'Code', 'required|trim', [
            'required'  => 'Code tidak boleh kosong.',
        ]);

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('price', 'Price', 'required', [
            'required' => 'Password tidak boleh kosong.'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $code = $this->input->post('code');
            $this->unitProduct($code, "$('#tambahUnitModal').modal('show');");
        } else {
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data = [
                'kd_product' => $this->input->post('code'),
                'name_unit' => $this->input->post('name'),
                'price_unit' => preg_replace("/[^0-9]/", "", $this->input->post('price')),
                'users' => $user['id'],
            ];

            // if (isset($_FILES['photo']['name'])) {
            //     $config['upload_path']         = './images/users/';
            //     $config['allowed_types']     = 'gif|jpg|png|jpeg';
            //     $config['overwrite']          = true;

            //     $this->load->library('upload', $config);

            //     if (!$this->upload->do_upload('photo')) {
            //         $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');
            //         redirect('cuti/cuti_add');
            //     } else {
            //         $img = $this->upload->data();
            //         $data['photo'] = $img['file_name'];
            //     }
            // }

            $this->db->insert('unit_product', $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Karyawan Berhasil Ditambahkan!", "success");');

            redirect('admin/barang/unitProduct/' . $this->input->post('code'));
        }
    }
}

/* End of file Dashboard.php */
