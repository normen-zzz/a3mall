<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Catalogue extends CI_Controller
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
        $this->load->model('Catalogue_model', 'catalogue');
    }

    public function index($modal = '')
    {
        $data = [
            "title" => "A3Mall|Catalogue",
            "page" => "admin/catalogue/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "catalogue" => $this->db->get('catalogue')->result_array(),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }



    public function getCatalogue()
    {
        $id = $this->input->get('id_catalogue');
        $result = $this->catalogue->getCatalogueAjax($id);
        echo json_encode($result);
    }
    //Menambahkan Catalogue
    public function addCatalogue()
    {



        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('describe', 'Describe', 'required', [
            'required' => 'Describe tidak boleh kosong.'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#tambahCatalogueModal').modal('show');");
        } else {
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $title = trim(strtolower($this->input->post('name')));
            $out = explode(" ", $title);
            $slug = implode("-", $out);
            $data = [

                'name_catalogue' => $this->input->post('name'),
                'describe_catalogue' => $this->input->post('describe'),
                'slug_catalogue' => $slug,
            ];

            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/user/img/katalog/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                    $this->index("$('#tambahCatalogueModal').modal('show');");
                } else {
                    $img = $this->upload->data();
                    $data['photo_catalogue'] = $img['file_name'];
                }
                if (isset($_FILES['pdf']['name'])) {
                    $config['upload_path']         = './assets/user/img/katalog/pdf/';
                    $config['allowed_types']     = 'pdf';
                    $config['overwrite']          = true;
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('pdf')) {
                        $this->session->set_flashdata('message', 'swal("Ops!", "Pdf gagal diupload", "error");');

                        $this->index("$('#tambahCatalogueModal').modal('show');");
                    } else {
                        $img = $this->upload->data();
                        $data['pdf_catalogue'] = $img['file_name'];
                        $this->db->insert('catalogue', $data);
                    }
                }
            }



            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Catalogue Berhasil Ditambahkan!", "success");');

            redirect('admin/Catalogue');
        }
    }

    public function editCatalogue()
    {

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('describe', 'Describe', 'required', [
            'required' => 'Describe tidak boleh kosong.'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#ubahCatalogueModal').modal('show');");
        } else {
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $title = trim(strtolower($this->input->post('name')));
            $out = explode(" ", $title);
            $slug = implode("-", $out);
            $data = [

                'name_catalogue' => $this->input->post('name'),
                'describe_catalogue' => $this->input->post('describe'),
                'slug_catalogue' => $slug,
            ];

            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/user/img/katalog/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                    $this->index("$('#tambahCatalogueModal').modal('show');");
                } else {
                    $img = $this->upload->data();
                    $data['photo_catalogue'] = $img['file_name'];
                }
                if (isset($_FILES['pdf']['name'])) {
                    $config['upload_path']         = './assets/user/img/katalog/pdf/';
                    $config['allowed_types']     = 'pdf';
                    $config['overwrite']          = true;
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('pdf')) {
                        $this->session->set_flashdata('message', 'swal("Ops!", "Pdf gagal diupload", "error");');

                        $this->index("$('#tambahCatalogueModal').modal('show');");
                    } else {
                        $img = $this->upload->data();
                        $data['pdf_catalogue'] = $img['file_name'];
                    }
                }
            }


            $this->db->update('catalogue', $data, array('id_catalogue' => $this->input->post('id')));
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Catalogue Berhasil Diubah!", "success");');

            redirect('admin/Catalogue');
        }
    }



    public function deleteCatalogue($slug)
    {
        $catalogue = $this->db->get_where('catalogue', ['slug_catalogue' => $slug])->row_array();
        $detail_catalogue = $this->db->get_where('detail_catalogue', ['slug_catalogue' => $slug])->result_array();
        foreach ($detail_catalogue as $detail_catalogue) {
            unlink(FCPATH . 'assets/user/img/katalog/' . $detail_catalogue['photo_detail_catalogue']);
            $this->db->delete('detail_catalogue', ['slug_catalogue' => $detail_catalogue['slug_catalogue']]);
        }

        unlink(FCPATH . 'assets/user/img/katalog/' . $catalogue['photo_catalogue']);
        unlink(FCPATH . 'assets/user/img/katalog/pdf/' . $catalogue['pdf_catalogue']);
        $this->db->delete('catalogue', ['slug_catalogue' => $slug]);

        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Catalogue Berhasil Dihapus!", "success");');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function detail($slug = false, $modal = '')
    {
        $data = [
            "title" => "A3Mall|Catalogue",
            "page" => "admin/catalogue/detail",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "detailcatalogue" => $this->db->get_where('detail_catalogue', array('slug_catalogue' => $slug))->result_array(),
            "modal" => $modal,
            "slug" => $slug
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }

    //Menambahkan Detail Catalogue
    public function addDetailCatalogue()
    {

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('describe', 'Describe', 'required', [
            'required' => 'Price tidak boleh kosong.'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->detail($this->input->post('slug'), "$('#tambahDetailCatalogueModal').modal('show');");
        } else {
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $data = [

                'name_detail_catalogue' => $this->input->post('name'),
                'describe_detail_catalogue' => $this->input->post('describe'),
                'slug_catalogue' => $this->input->post('slug'),

            ];

            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/user/img/katalog/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                    $this->index("$('#tambahDetailCatalogueModal').modal('show');");
                } else {
                    $img = $this->upload->data();
                    $data['photo_detail_catalogue'] = $img['file_name'];
                }
            }


            $this->db->insert('detail_catalogue', $data);
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Catalogue Berhasil Ditambahkan!", "success");');

            redirect('admin/Catalogue/detail/' . $this->input->post('slug'));
        }
    }

    //Menambahkan Detail Catalogue
    public function editDetailCatalogue()
    {

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('describe', 'Describe', 'required', [
            'required' => 'Price tidak boleh kosong.'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->detail($this->input->post('slug'), "$('#editDetailCatalogueModal').modal('show');");
        } else {
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $data = [

                'name_detail_catalogue' => $this->input->post('name'),
                'describe_detail_catalogue' => $this->input->post('describe'),
                'slug_catalogue' => $this->input->post('slug'),

            ];

            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/user/img/katalog/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                    $this->index("$('#editDetailCatalogueModal').modal('show');");
                } else {
                    $img = $this->upload->data();
                    $data['photo_detail_catalogue'] = $img['file_name'];
                }
            }


            $this->db->update('detail_catalogue', $data, array('id_detail_catalogue' => $this->input->post('id')));
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Catalogue Berhasil Ditambahkan!", "success");');

            redirect('admin/Catalogue/detail/' . $this->input->post('slug'));
        }
    }
    public function getDetailCatalogue()
    {
        $id = $this->input->get('id_detail_catalogue');
        $result = $this->catalogue->getDetailCatalogueAjax($id);
        echo json_encode($result);
    }

    public function deleteDetailCatalogue($id)
    {
        $detail_catalogue = $this->db->get_where('detail_catalogue', ['id_detail_catalogue' => $id])->row_array();
        unlink(FCPATH . 'assets/user/img/katalog/' . $detail_catalogue['photo_detail_catalogue']);
        $this->db->delete('detail_catalogue', ['id_detail_catalogue' => $id]);

        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Detail Catalogue Berhasil Dihapus!", "success");');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file Dashboard.php */
