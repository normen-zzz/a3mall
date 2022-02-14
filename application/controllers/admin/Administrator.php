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
            'modal' => $modal
        ];

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
            ];

            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

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
            $this->admin->editAdmin($this->input->post('email'), $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Admin Berhasil Diubah!", "success");');

            redirect(base_url('admin/Administrator'));
        }
    }
}

/* End of file Dashboard.php */
