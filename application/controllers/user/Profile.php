<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
        $this->load->model('User_model', 'user');
    }

    public function index($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
        } else {
            $usergoogle = '';
        }



        $data = [
            "title" => "A3MALL | Profile",
            "page" => "user/profile/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    //For AJax
    public function getProfile()
    {
        $id = $this->input->get('email');
        $result = $this->user->getProfileAjax($id);
        echo json_encode($result);
    }

    public function ubahProfile()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required'  => 'email tidak boleh kosong.',
        ]);

        $this->form_validation->set_rules('first_name', 'First Name', 'required', [
            'required' => 'Nama Depan tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('last_name', 'Last Name', 'required', [
            'required' => 'Nama Belakang tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('phone', 'Phone', 'required', [
            'required' => 'Nomor Telp tidak boleh kosong.'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#exampleModal').modal('show');");
        } else {
            $email = $this->input->post('email');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $phone = $this->input->post('phone');
            $data = [
                'email' => $this->input->post('email'),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone' => $phone,
            ];
            $this->user->editUser($email, $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data User Berhasil Diubah!", "success");');

            redirect(base_url('Profile'));
        }
    }

    public function alamat($modal = "")
    {
        $this->load->model('Ongkir_model', 'ongkir');
        $google = $this->session->userdata('user_data');
        if ($google) {
            $alamat = $this->user->getAlamatByEmail($google['email']);
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            if (!$alamat->num_rows()) {
                $alamat = '';
                $alamatongkir = '';
            } else {
                $alamat = $this->user->getAlamatByEmail($google['email'])->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
            }
        } else {
            $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'));
            $usergoogle = '';
            if (!$alamat->num_rows()) {
                $alamat = '';
                $alamatongkir = '';
            } else {
                $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'))->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
            }
        }

        $getProvince = $this->ongkir->getProvinceOngkir();
        $province = $getProvince->rajaongkir->results;

        $data = [
            "title" => "A3MALL | Alamat",
            "page" => "user/profile/alamat",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "modal" => $modal,
            "alamat" => $alamat,
            "alamatongkir" => $alamatongkir,
            "province" => $province
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    //For AJax
    public function getAlamat()
    {
        $id = $this->input->get('email');
        $result = $this->user->getAlamatAjax($id);
        echo json_encode($result);
    }

    public function addAlamat()
    {
        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('phone', 'Phone', 'required', [
            'required' => 'Phone tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', [
            'required' => 'Provinsi tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required', [
            'required' => 'kabupaten tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
            'required' => 'Kecamatan tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('pos', 'Pos', 'required', [
            'required' => 'Kode Pos tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('detail', 'Detail', 'required', [
            'required' => 'Detail Alamat tidak boleh kosong.'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->alamat("$('#exampleModal1').modal('show');");
        } else {
            $google = $this->session->userdata('user_data');
            if ($this->session->userdata('email')) {
                $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            } else {
                $user = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            }

            $data = [
                'email' => $user['email'],
                'nama_alamat' => $this->input->post('name'),
                'telp_alamat' => $this->input->post('phone'),
                'provinsi_alamat' => $this->input->post('provinsi'),
                'kabupaten_alamat' => $this->input->post('kabupaten'),
                'kecamatan_alamat' => $this->input->post('kecamatan'),
                'pos_alamat' => $this->input->post('pos'),
                'detail_alamat' => $this->input->post('detail'),
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

            $this->db->insert('alamat', $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Barang Berhasil Ditambahkan!", "success");');

            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function editAlamat()
    {

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('phone', 'Phone', 'required', [
            'required' => 'Phone tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', [
            'required' => 'Provinsi tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required', [
            'required' => 'kabupaten tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
            'required' => 'Kecamatan tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required', [
            'required' => 'Kelurahan tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('pos', 'Pos', 'required', [
            'required' => 'Kode Pos tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('detail', 'Detail', 'required', [
            'required' => 'Detail Alamat tidak boleh kosong.'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->alamat("$('#exampleModal1').modal('show');");
        } else {
            $google = $this->session->userdata('user_data');
            if ($this->session->userdata('email')) {
                $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            } else {
                $user = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            }
            $data = [
                'email' => $user['email'],
                'nama_alamat' => $this->input->post('name'),
                'telp_alamat' => $this->input->post('phone'),
                'provinsi_alamat' => $this->input->post('provinsi'),
                'kabupaten_alamat' => $this->input->post('kabupaten'),
                'kecamatan_alamat' => $this->input->post('kecamatan'),
                'kelurahan_alamat' => $this->input->post('kelurahan'),
                'pos_alamat' => $this->input->post('pos'),
                'detail_alamat' => $this->input->post('detail'),
            ];
            $this->barang->editAlamat($user['email'], $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Alamat Berhasil Diubah!", "success");');

            redirect('Alamat');
        }
    }

    public function deleteAlamat($id)
    {
        $this->db->delete('alamat', ['id_alamat' => $id]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Alamat Berhasil Dihapus!", "success");');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file Dashboard.php */
