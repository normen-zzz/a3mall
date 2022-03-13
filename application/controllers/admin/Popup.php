<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Popup extends CI_Controller
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
        $this->load->model('Blog_model', 'blog');
        $this->load->model('Cms_model', 'cms');
        $this->load->model('Popup_model', 'popup');
    }

    public function index($modal = '')
    {
        $data = [
            "title" => "A3Mall|Popup",
            "page" => "admin/popup/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "popup" => $this->popup->getPopup()->result_array(),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }


    public function getPopup()
    {
        $id = $this->input->get('id_popup');
        $result = $this->popup->getPopupAjax($id);
        echo json_encode($result);
    }
    //Menambahkan Blog
    public function addPopup()
    {
        if (isset($_FILES['photo']['name'])) {
            $config['upload_path']         = './assets/user/img/popup/';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['overwrite']          = true;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                $this->index("$('#tambahPopupModal').modal('show');");
            } else {
                $img = $this->upload->data();
                $data['photo_popup'] = $img['file_name'];
                $data['buttonlink_popup'] = $this->input->post('link');
            }
            $this->db->insert('popup', $data);
        }
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Popup Berhasil Ditambahkan!", "success");');

        redirect('admin/Popup');
    }

    //Menambahkan Blog
    public function editPopup()
    {

        if (isset($_FILES['photo']['name'])) {
            $config['upload_path']         = './assets/user/img/popup/';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['overwrite']          = true;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                $this->index("$('#ubahPopupModal').modal('show');");
            } else {
                $img = $this->upload->data();
                $data['photo_popup'] = $img['file_name'];
            }
        }
        $data['buttonlink_popup'] = $this->input->post('link');
        $this->db->update('popup', $data, array('id_popup' => $this->input->post('id')));
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Popup Berhasil Ditambahkan!", "success");');

        redirect('admin/Popup');
    }



    public function deletePopup($id)
    {
        $popup = $this->db->get_where('popup', ['id_popup' => $id])->row_array();
        unlink(FCPATH . 'assets/user/img/popup/' . $popup['photo_popup']);
        $this->db->delete('popup', ['id_popup' => $id]);

        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Popup Berhasil Dihapus!", "success");');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file Dashboard.php */
