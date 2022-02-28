<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Carousel extends CI_Controller
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
    }

    public function index($modal = '')
    {
        $data = [
            "title" => "A3Mall|Carousel",
            "page" => "admin/carousel/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "carousel" => $this->cms->getCarousel()->result_array(),
            "modal" => $modal
        ];

        $this->load->view('admin/templates/app', $data, FALSE);
    }


    public function getBlog()
    {
        $id = $this->input->get('id_blog');
        $result = $this->blog->getBlogAjax($id);
        echo json_encode($result);
    }
    //Menambahkan Blog
    public function addCarousel()
    {
        if (isset($_FILES['photo']['name'])) {
            $config['upload_path']         = './assets/user/img/carousel/';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['overwrite']          = true;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                $this->index("$('#tambahCarouselModal').modal('show');");
            } else {
                $img = $this->upload->data();
                $data['photo_carousel'] = $img['file_name'];
            }
            $this->db->insert('carousel', $data);
        }
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Carousel Berhasil Ditambahkan!", "success");');

        redirect('admin/Carousel');
    }

    //Menambahkan Blog
    public function editCarousel()
    {

        if (isset($_FILES['photo']['name'])) {
            $config['upload_path']         = './assets/user/img/carousel/';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['overwrite']          = true;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                $this->index("$('#ubahCarouselModal').modal('show');");
            } else {
                $img = $this->upload->data();
                $data['photo_carousel'] = $img['file_name'];
            }
        }
        $this->db->update('carousel', $data, array('id_carousel' => $this->input->post('id')));
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Carousel Berhasil Ditambahkan!", "success");');

        redirect('admin/Carousel');
    }



    public function deleteCarousel($id)
    {
        $carousel = $this->db->get_where('carousel', ['id_carousel' => $id])->row_array();
        unlink(FCPATH . 'assets/user/img/carousel/' . $carousel['photo_carousel']);
        $this->db->delete('carousel', ['id_carousel' => $id]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data carousel Berhasil Dihapus!", "success");');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file Dashboard.php */
