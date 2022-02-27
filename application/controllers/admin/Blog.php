<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
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
    }

    public function index($modal = '')
    {
        $data = [
            "title" => "A3Mall|Blog",
            "page" => "admin/blog/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "blog" => $this->blog->getBlog()->result_array(),
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
    public function addBlog()
    {

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Title tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('writer', 'Writer', 'required', [
            'required' => 'Writer tidak boleh kosong.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#tambahBlogModal').modal('show');");
        } else {
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $title = trim(strtolower($this->input->post('title')));
            $out = explode(" ", $title);
            $slug = implode("-", $out);
            $data = [

                'title_blog' => $this->input->post('title'),
                'content_blog' => $this->input->post('content'),
                'slug_blog' => $slug,
                'writer_blog' => $this->input->post('writer'),
            ];

            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/user/img/blog/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                    $this->index("$('#tambahBlogModal').modal('show');");
                } else {
                    $img = $this->upload->data();
                    $data['photo_blog'] = $img['file_name'];
                }
                $this->db->insert('blog', $data);
            }
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Blog Berhasil Ditambahkan!", "success");');

            redirect('admin/Blog');
        }
    }

    //Menambahkan Blog
    public function editBlog()
    {

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Title tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('writer', 'Writer', 'required', [
            'required' => 'Writer tidak boleh kosong.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#ubahBlogModal').modal('show');");
        } else {
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $title = trim(strtolower($this->input->post('title')));
            $out = explode(" ", $title);
            $slug = implode("-", $out);
            $data = [

                'title_blog' => $this->input->post('title'),
                'content_blog' => $this->input->post('content'),
                'slug_blog' => $slug,
                'writer_blog' => $this->input->post('writer'),
            ];

            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/user/img/blog/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');

                    $this->index("$('#ubahBlogModal').modal('show');");
                } else {
                    $img = $this->upload->data();
                    $data['photo_blog'] = $img['file_name'];
                }
            }
            $this->db->update('blog', $data, array('id_blog' => $this->input->post('id')));
            $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Blog Berhasil Ditambahkan!", "success");');

            redirect('admin/Blog');
        }
    }



    public function deleteBlog($id)
    {
        $blog = $this->db->get_where('blog', ['id_blog' => $id])->row_array();
        unlink(FCPATH . 'assets/user/img/blog/' . $blog['photo_blog']);
        $this->db->delete('blog', ['id_blog' => $id]);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Catalogue Berhasil Dihapus!", "success");');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file Dashboard.php */
