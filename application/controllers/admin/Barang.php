<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect('admin/Auth');
        }
        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect('Dashboard');
        }
    }

    public function springbed($modal = "")
    {
        $data = [
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "title" => "Data Spring Bed",
            "title2" => "Spring Bed",
            "page" => "admin/barang/index",
            "barang" => $this->barang->getProductByCategory('1'),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data);
    }

    public function sofa($modal = "")
    {
        $data = [
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "title" => "Data Sofa",
            "title2" => "Sofa",
            "page" => "admin/barang/index",
            "barang" => $this->barang->getProductByCategory('2'),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data);
    }
    //For AJax
    public function getBarang()
    {
        $id = $this->input->get('kd_product');
        $result = $this->barang->getBarangAjax($id);
        echo json_encode($result);
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

        $this->form_validation->set_rules('beforeprice', 'Before Price', 'required', [
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
                'slug_product' => $this->input->post('brand') . "-" . $slug,
                'price_product' => preg_replace("/[^0-9]/", "", $this->input->post('price')),
                'describe_product' => $this->input->post('describe'),
                'brand_product' => $this->input->post('brand'),
                'category_product' => $this->input->post('category'),
                'status_product' => $this->input->post('status'),
                'users' => $user['id'],
                'date_arrived' => $this->input->post('date'),
                'beforeprice_product' => preg_replace("/[^0-9]/", "", $this->input->post('beforeprice')),
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
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Barang Berhasil Ditambahkan!", "success");');

            redirect('admin/barang/' . $jenis);
        }
    }

    public function editBarang($id)
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

        $this->form_validation->set_rules('beforeprice', 'Price', 'required', [
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
            $this->$jenis("$('#editBarangModal').modal('show');");
        } else {
            $jenis = $this->input->post('jenis');
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $title = trim(strtolower($this->input->post('name')));
            $out = explode(" ", $title);
            $slug = implode("-", $out);
            $data = [
                'kd_product' => $this->input->post('code'),
                'name_product' => $this->input->post('name'),
                'slug_product' => $this->input->post('brand') . "-" . $slug,
                'price_product' => preg_replace("/[^0-9]/", "", $this->input->post('price')),
                'describe_product' => $this->input->post('describe'),
                'brand_product' => $this->input->post('brand'),
                'category_product' => $this->input->post('category'),
                'users' => $user['id'],
                'status_product' => $this->input->post('status'),
                'date_arrived' => $this->input->post('date'),
                'beforeprice_product' => $this->input->post('beforeprice')
            ];
            $this->barang->editBarang($this->input->post('code'), $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Barang Berhasil Diubah!", "success");');

            redirect(base_url('admin/Barang/' . $jenis));
        }
    }

    public function photoBarang($code, $modal = "")
    {
        $data = [
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "title" => "Photo Barang",
            "title2" => "$code",
            "page" => "admin/barang/photobarang",
            "photo" => $this->barang->getPhotoBarang($code),
            "variation" => $this->db->get_where('variation_product', array('kd_product' => $code))->result_array(),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data);
    }

    public function addPhotoBarang($code)
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data = [

            'kd_product' => $code,
            'describe_photoproduct' => $this->input->post('describe'),
            'users' => $user['id'],
        ];

        if (isset($_FILES['photo']['name'])) {
            $config['upload_path']         = './assets/images/produk/';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['overwrite']          = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');
                $this->photoBarang($this->input->post('code'), "$('#tambahPhotoBarangModal').modal('show');");
            } else {
                $img = $this->upload->data();
                $data['photo_product'] = $img['file_name'];
                $this->db->insert('photo_product', $data);
            }
        }


        $this->session->set_flashdata('message', 'swal("Berhasil!", "Photo Barang Berhasil Ditambahkan!", "success");');

        redirect('admin/barang/photoBarang/' . $code);
    }

    public function deleteBarang($code)
    {
        $photoproduct = $this->db->get_where('photo_product', ['kd_product' => $code])->row_array();
        $photounit = $this->db->get_where('unit_product', ['kd_product' => $code])->row_array();

        $photoproductold = $photoproduct['photo'];
        $photounitold = $photounit['photo_unit'];
        unlink(FCPATH . 'assets/images/produk/' . $photoproductold);
        unlink(FCPATH . 'assets/images/unitproduk/' . $photounitold);
        $this->db->delete('unit_product', ['kd_product' => $code]);
        $this->db->delete('photo_product', ['kd_product' => $code]);
        $this->db->delete('product', ['kd_product' => $code]);
        $this->db->delete('variation_product', ['kd_product' => $code]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Barang Berhasil Dihapus!", "success");');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deletePhotoBarang($id)
    {
        $foto = $this->db->get_where('photo_product', ['id_photoproduct' => $id])->row_array();
        $gambar_lama = $foto['photo'];
        unlink(FCPATH . 'assets/images/produk/' . $gambar_lama);
        $this->db->delete('photo_product', ['id_photoproduct' => $id]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Photo Barang Berhasil Dihapus!", "success");');
        redirect('admin/Barang/photoBarang/' . $foto['kd_product']);
    }

    //Tampil Unit
    public function unitProduct($code, $modal = "")
    {
        $product = $this->db->get_where('product', array('kd_product' => $code))->row();
        $data = [
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "title" => "Data Unit " . $product->name_product,
            "page" => "admin/barang/unit/index",
            "unit" => $this->barang->getUnitByCodeProduct($code),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data);
    }

    //For AJax
    public function getUnit()
    {
        $id = $this->input->get('id_unit');
        $result = $this->barang->getUnitAjax($id);
        echo json_encode($result);
    }

    //Menambahkan Unit
    public function addUnit()
    {

        $this->form_validation->set_rules('kd_product', 'Kd_product', 'required|trim', [
            'required'  => 'Code tidak boleh kosong.',
        ]);
        $this->form_validation->set_rules('kd_unit', 'Kd_unit', 'required|trim|is_unique[unit_product.kd_unit]', [
            'required'  => 'Code tidak boleh kosong.',
            'is_unique' => 'Kode Ini sudah Ada di Unit Lain'
        ]);

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('price', 'Price', 'required', [
            'required' => 'Price tidak boleh kosong.'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $code = $this->input->post('code');
            $this->unitProduct($code, "$('#tambahUnitModal').modal('show');");
        } else {
            $code = $this->input->post('kd_product');
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data = [
                'kd_product' => $code,
                'kd_unit' => $this->input->post('kd_unit'),
                'name_unit' => $this->input->post('name'),
                'price_unit' => preg_replace("/[^0-9]/", "", $this->input->post('price')),
                'users' => $user['id'],
            ];

            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/images/produk/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                    $this->unitProduct($code, "$('#tambahUnitModal').modal('show');");
                } else {
                    $img = $this->upload->data();
                    $data['photo_unit'] = $img['file_name'];
                    $this->db->insert('unit_product', $data);
                }
            }


            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Unit Berhasil Ditambahkan!", "success");');

            redirect('admin/barang/unitProduct/' . $code);
        }
    }

    public function editUnit($id)
    {

        $this->form_validation->set_rules('code', 'Code', 'required|trim', [
            'required'  => 'Code tidak boleh kosong.',
        ]);

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('price', 'Price', 'required', [
            'required' => 'Price tidak boleh kosong.'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $code = $this->input->post('code');
            $this->unitProduct($code, "$('#ubahUnitModal').modal('show');");
        } else {
            $code = $this->input->post('code');
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data = [
                'name_unit' => $this->input->post('name'),
                'price_unit' => preg_replace("/[^0-9]/", "", $this->input->post('price')),
                'users' => $user['id'],
            ];
            $oldPhoto = $this->input->post('ganti_gambar');
            $path = './assets/images/unitproduk/';
            $config['upload_path']         = './assets/images/unitproduk/';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['overwrite']          = true;

            $this->load->library('upload', $config);
            // Jika foto diubah
            if ($_FILES['photo']['name']) {
                if ($this->upload->do_upload('photo')) {

                    @unlink($path . $oldPhoto);
                    if (!$this->upload->do_upload('photo')) {
                        $this->session->set_flashdata('message', 'swal("Ops!", "Photo gagal diupload", "error");');
                        $this->unitProduct($code, "$('#ubahUnitModal').modal('show');");
                    } else {
                        $newPhoto = $this->upload->data();
                        $data['photo_unit'] = $newPhoto['file_name'];
                    }
                }
            }
            $this->barang->editUnit($this->input->post('id'), $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Unit Berhasil Diubah!", "success");');

            redirect(base_url('admin/Barang/unitProduct/' . $code));
        }
    }

    public function deleteUnit($id)
    {
        $foto = $this->db->get_where('unit_product', ['id_unit' => $id])->row_array();
        $gambar_lama = $foto['photo_unit'];
        unlink(FCPATH . 'assets/images/unitproduk/' . $gambar_lama);
        $this->db->delete('unit_product', ['id_unit' => $id]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Unit Berhasil Dihapus!", "success");');
        redirect('admin/Barang/unitProduct/' . $foto['kd_product']);
    }

    //Variation
    public function variationBarang($code, $modal = "")
    {
        $data = [
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "title" => "Variation Barang",
            "title2" => "$code",
            "page" => "admin/barang/variationbarang",
            "variation" => $this->barang->getVariationBarang($code),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data);
    }

    public function addVariation()
    {

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->variationBarang($this->uri->segment(4), "$('#tambahVariationModal').modal('show');");
        } else {
            $data = [
                'kd_product' => $this->input->post('code'),
                'name_variation' => $this->input->post('name'),
            ];



            $this->db->insert('variation_product', $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Barang Berhasil Ditambahkan!", "success");');

            redirect('admin/barang/variationBarang/' . $this->input->post('code'));
        }
    }

    public function editVariation()
    {
        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->variationBarang($this->uri->segment(4), "$('#editVariationModal').modal('show');");
        } else {
            $data = [
                'name_variation' => $this->input->post('name'),
            ];
            $this->barang->editVariation($this->input->post('id'), $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Variation Berhasil Diubah!", "success");');

            redirect(base_url('admin/Barang/variationBarang/' . $this->input->post('code')));
        }
    }

    public function deleteVariationBarang($id)
    {

        $this->db->delete('variation_product', ['id_variation' => $this->uri->segment(5)]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Photo Barang Berhasil Dihapus!", "success");');
        redirect('admin/Barang/variationBarang/' . $this->uri->segment(4));
    }

    //For AJax
    public function getVariation()
    {
        $code = $this->input->get('id_variation');
        $result = $this->barang->getVariationAjax($code);
        echo json_encode($result);
    }
}

/* End of file Dashboard.php */
