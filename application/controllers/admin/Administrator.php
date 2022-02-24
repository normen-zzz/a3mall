<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
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
        $this->load->model('Admin_model', 'admin');
    }

    public function index($modal = '')
    {
        $data = [
            "title" => "A3Mall|Administrator",
            "page" => "admin/administrator/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "admin" => $this->admin->getAdministrator(),
            "group" => $this->admin->getGroup()->result_array(),
            'modal' => $modal
        ];

        if ($data['user']['group'] != 1) {
            redirect('admin/Dashboard');
        }

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    //For AJax
    public function getAdmin()
    {
        $email = $this->input->get('email');
        $result = $this->admin->getAdminAjax($email);
        echo json_encode($result);
    }

    public function editAdmin()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required'  => 'username tidak boleh kosong.',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'email tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('first_name', 'First_name', 'required', [
            'required' => 'First Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('last_name', 'Last_Name', 'required', [
            'required' => 'Last Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('phone', 'Phone', 'required', [
            'required' => 'Phone tidak boleh kosong.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#editAdminModal').modal('show');");
        } else {
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'group' => $this->input->post('group'),
            ];

            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $oldPhoto = $this->input->post('ganti_gambar');
            $path = './assets/images/unitproduk/';
            $config['upload_path']         = './assets/admin/img/profil/';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['overwrite']          = true;

            $this->load->library('upload', $config);
            // Jika foto diubah
            if ($_FILES['photo']['name']) {
                if ($this->upload->do_upload('photo')) {

                    @unlink($path . $oldPhoto);
                    if (!$this->upload->do_upload('photo')) {
                        $this->session->set_flashdata('message', 'swal("Ops!", "Photo gagal diupload", "error");');
                        $this->index("$('#editAdminModal').modal('show');");
                    } else {
                        $newPhoto = $this->upload->data();
                        $data['photo'] = $newPhoto['file_name'];
                    }
                }
            }
            $this->admin->editAdmin($this->input->post('email'), $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Admin Berhasil Diubah!", "success");');

            redirect(base_url('admin/Administrator'));
        }
    }

    public function addAdmin()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
            'required'  => 'username tidak boleh kosong.',
            'is_unique' => 'Username Sudah Ada yang Menggunakan'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'required' => 'email tidak boleh kosong.',
            'is_unique' => 'email sudah ada yang menggunakan',
            'valid_email' => 'email tidak Valid'
        ]);

        $this->form_validation->set_rules('first_name', 'First_name', 'required', [
            'required' => 'First Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('last_name', 'Last_Name', 'required', [
            'required' => 'Last Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('phone', 'Phone', 'required', [
            'required' => 'Phone tidak boleh kosong.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#tambahAdminModal').modal('show');");
        } else {
            $data = [
                'ip_address' => $this->input->ip_address(),
                'username' => $this->input->post('username'),
                'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'created_on' => time(),
                'active' => 1,
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'group' => $this->input->post('group'),
            ];

            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/admin/img/profil/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');
                    redirect(base_url('admin/Administrator'));
                } else {
                    $img = $this->upload->data();
                    $data['photo'] = $img['file_name'];
                }
            }
            $this->admin->addAdmin($data);

            $admin = $this->admin->getAdministratorWhere($this->input->post('email'));

            $grup = [
                'user_id' => $admin->id,
                'group_id' => 1
            ];

            $this->db->insert('users_groups', $grup);

            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Admin Berhasil Ditambah!", "success");');

            redirect(base_url('admin/Administrator'));
        }
    }

    public function deleteAdmin($email)
    {
        $foto = $this->db->get_where('users', ['email' => urldecode($email)])->row_array();
        $gambar_lama = $foto['photo'];
        unlink(FCPATH . 'assets/admin/img/profil/' . $gambar_lama);
        $this->db->delete('users', ['email' => urldecode($email)]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Admin Berhasil Dihapus!", "success");');
        redirect('admin/Administrator');
    }

    //Group
    public function group($modal = '')
    {
        $data = [
            "title" => "A3Mall|Group Administrator",
            "page" => "admin/administrator/group",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "group" => $this->admin->getGroup()->result_array(),
            'modal' => $modal
        ];

        if ($data['user']['group'] != 1) {
            redirect('admin/Dashboard');
        }

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    //For AJax
    public function getGroup()
    {
        $id = $this->input->get('id');
        $result = $this->admin->getGroupAjax($id);
        echo json_encode($result);
    }

    public function addGroup()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[groups.name]', [
            'required'  => 'Name tidak boleh kosong.',
            'is_unique' => 'Name Sudah Ada yang Menggunakan'
        ]);

        $this->form_validation->set_rules('description', 'Description', 'required', [
            'required' => 'Description tidak boleh kosong.'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#tambahGroupModal').modal('show');");
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
            ];


            $this->db->insert('groups', $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Group Berhasil Ditambah!", "success");');

            redirect(base_url('admin/Administrator/group'));
        }
    }

    public function editGroup()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[groups.name]', [
            'required'  => 'Name tidak boleh kosong.',
            'is_unique' => 'Name Sudah Ada yang Menggunakan'
        ]);

        $this->form_validation->set_rules('description', 'Description', 'required', [
            'required' => 'Description tidak boleh kosong.'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#editGroupModal').modal('show');");
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
            ];


            $this->admin->editGroup($this->input->post('id'), $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Group Berhasil Diubah!", "success");');

            redirect(base_url('admin/Administrator/group'));
        }
    }

    public function deleteGroup($id)
    {

        $this->db->delete('groups', ['id' => $id]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Group Berhasil Dihapus!", "success");');
        redirect('admin/Administrator/group');
    }
}

/* End of file Dashboard.php */
