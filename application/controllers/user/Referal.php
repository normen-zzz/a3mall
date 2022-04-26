<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Referal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
        $this->load->model('User_model', 'user');
        $this->load->model('Referal_model', 'referal');
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $referalbe = $this->referal->getReferalEmail($google['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
            $email = $google['email'];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $referalbe = $this->referal->getReferalEmail($user['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
            $email = $user['email'];
        }


        if ($user['group'] != 5) {
            redirect('Dashboard');
        }



        $data = [
            "title" => "A3MALL | Referral",
            "page" => "user/referal/referal",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "userreferal" => $userreferal,
            "referal" => $referalbe,
            "sumincome" => $this->referal->getSumIncomeReferal($referalbe->code_referal)->row(),
            "countincome" => $this->referal->getCountIncomeReferal($referalbe->code_referal),
            "sumorder" => $this->referal->getSumIncomeOrderReferal($referalbe->users_email_referal)->row(),
            "countincomeorder" => $this->referal->getCountIncomeOrderReferal($referalbe->users_email_referal),

            "incomemonth" => $this->referal->getOmsetIncomeMonthReferal($referalbe->code_referal)->row(),
            "incomeyear" => $this->referal->getOmsetIncomeYearReferal($referalbe->code_referal)->row(),
            "incomeordermonth" => $this->referal->getOmsetIncomeOrderMonthReferal($email)->row(),
            "incomeorderyear" => $this->referal->getOmsetIncomeOrderYearReferal($email)->row(),
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function income($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $referalbe = $this->referal->getReferalEmail($google['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $referalbe = $this->referal->getReferalEmail($user['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
        }


        if ($referalbe->level_referal != 3) {
            redirect('Dashboard');
        }



        $data = [
            "title" => "A3MALL | Referral",
            "page" => "user/referal/income",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "referal" => $referalbe->code_referal,
            "income" => $this->referal->getIncomeReferal($this->uri->segment(3))->result_array(),
            "modal" => $modal,
        ];



        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function incomeOrder($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $referalbe = $this->referal->getReferalEmail($google['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $referalbe = $this->referal->getReferalEmail($user['email'])->row();
            $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();
        }


        if ($referalbe->level_referal != 3) {
            redirect('Dashboard');
        }


        $data = [
            "title" => "A3MALL | Income Order Referral",
            "page" => "user/referal/incomeorder",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "referal" => $referalbe->code_referal,
            "incomeorder" => $this->referal->getIncomeOrderReferal($referalbe->users_email_referal)->result_array(),
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function addNpwp($modal = '')
    {
        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $data = [
                'npwp' => $this->input->post('npwp'),
                'email_npwp' => $usergoogle['email']
            ];
            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/user/img/referal/npwp/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');
                    $this->index("$('#exampleModal').modal('show');");
                } else {
                    $img = $this->upload->data();
                    $data['photo_npwp'] = $img['file_name'];
                }
            }
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data = [
                'npwp' => $this->input->post('npwp'),
                'email_npwp' => $user['email']
            ];
            if (isset($_FILES['photo']['name'])) {
                $config['upload_path']         = './assets/user/img/referal/npwp/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['overwrite']          = true;
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');
                    $this->index("$('#exampleModal').modal('show');");
                } else {
                    $img = $this->upload->data();
                    $data['photo_npwp'] = $img['file_name'];
                }
            }
        }
        $this->db->insert('npwp_be', $data);
        $this->session->set_flashdata('message', 'swal("Berhasil!", "Data Npwp Berhasil Ditambahkan!", "success");');

        redirect('Referral');
    }

    public function headBe($modal = '')
    {
        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $group = $usergoogle['group'];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $group = $user['group'];
        }
        $be = $this->db->get_where('users', ['group' => 5])->row();


        if ($group != 4) {
            redirect('Dashboard');
        }



        $data = [
            "title" => "A3MALL | Head Referral",
            "page" => "user/referal/headbe",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "be" => $this->db->get_where('users', ['group' => 5])->result_array(),
            "linkform" => $this->db->get('link_formreferal')->row(),
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function generateLinkForm()
    {
        $word = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 10, 15);
        $this->db->update('link_formreferal', ['links' => $word], ['id_link' => 1]);
        $result = $this->db->get('link_formreferal')->row();
        echo json_encode($result);
    }

    public function detailBe($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $group = $usergoogle['group'];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $group = $user['group'];
        }
        $be = $this->db->get_where('users', ['id' => $this->uri->segment(3)])->row();
        $referalbe = $this->referal->getReferalEmail($be->email)->row();
        $userreferal = $this->referal->getCustomerOnReferal($referalbe->code_referal)->result_array();

        if ($group != 4) {
            redirect('Dashboard');
        }



        $data = [
            "title" => "A3MALL | Referral",
            "page" => "user/referal/detailbe",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "userreferal" => $userreferal,
            "referal" => $referalbe->code_referal,
            "be" => $be,
            "sumincome" => $this->referal->getSumIncomeReferal($referalbe->code_referal)->row(),
            "countincome" => $this->referal->getCountIncomeReferal($referalbe->code_referal),
            "sumorder" => $this->referal->getSumIncomeOrderReferal($referalbe->users_email_referal)->row(),
            "countincomeorder" => $this->referal->getCountIncomeOrderReferal($referalbe->users_email_referal),

            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function detailBeincome($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $group = $usergoogle['group'];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $group = $user['group'];
        }

        $be = $this->db->get_where('users', ['id' => $this->uri->segment(5)])->row();
        $referalbe = $this->referal->getReferalEmail($be->email)->row();

        if ($group != 4) {
            redirect('Dashboard');
        }



        $data = [
            "title" => "A3MALL | Referral",
            "page" => "user/referal/income",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "referal" => $referalbe->code_referal,
            "income" => $this->referal->getIncomeReferal($this->uri->segment(4))->result_array(),
            "modal" => $modal,
        ];



        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function detailBeIncomeOrder($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $group = $usergoogle['group'];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $group = $user['group'];
        }

        $be = $this->db->get_where('users', ['id' => $this->uri->segment(4)])->row();
        $referalbe = $this->referal->getReferalEmail($be->email)->row();


        if ($group != 4) {
            redirect('Dashboard');
        }


        $data = [
            "title" => "A3MALL | Income Order Referral",
            "page" => "user/referal/detailbeincomeorder",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "referal" => $referalbe->code_referal,
            "incomeorder" => $this->referal->getIncomeOrderReferal($referalbe->users_email_referal)->result_array(),
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function verifikasiNpwp($modal = '')
    {
        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $group = $usergoogle['group'];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $group = $user['group'];
        }
        $be = $this->db->get_where('users', ['group' => 5])->row();
        $referalbe = $this->referal->getReferalEmail($be->email)->row();

        if ($group != 4) {
            redirect('Dashboard');
        }



        $data = [
            "title" => "A3MALL | Head Referral",
            "page" => "user/referal/verifikasinpwp",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "npwp" => $this->db->get_where('npwp_be', ['status' => 'deactive'])->result_array(),
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function accNpwp($id)
    {
        $this->db->update('npwp_be', ['status' => 'active'], ['id_npwp' => $id]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function formReferal($modal = "")
    {

        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $email = $usergoogle['email'];
            $group = $usergoogle['group'];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $email = $user['email'];
            $group = $user['group'];
        }

        $links = $this->db->get('link_formreferal')->row();

        if (!isset($email)) {
            redirect('Login');
        }
        if ($group == 5) {
            redirect('Dashboard');
        }
        if ($this->uri->segment(2) != $links->links) {
            redirect('Dashboard');
        }
        $data = [
            "title" => "A3MALL | Referral",
            "page" => "user/referal/formreferal",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "usergoogle" => $usergoogle,
            "email" => $email,
            "modal" => $modal,

        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function addFormReferal()
    {
        $google = $this->session->userdata('user_data');
        if ($google) {
            $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
            $email = $usergoogle['email'];
        } else {
            $usergoogle = '';
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $email = $user['email'];
        }
        $links = $this->db->get('link_formreferal')->row();
        $name = $this->input->post('name');
        $place_birth = $this->input->post('place_birth');
        $date_birth = $this->input->post('date_birth');
        $address_ktp = $this->input->post('address_ktp');
        $address_domisili = $this->input->post('address_domisili');
        $number = $this->input->post('number');
        $email = $email;
        $data = [
            'name' => $name,
            'place_birth' => $place_birth,
            'date_birth' => $date_birth,
            'address_ktp' => $address_ktp,
            'address_domisili' => $address_domisili,
            'number' => $number,
            'email' => $email,


        ];

        if (isset($_FILES['photo_person']['name'])) {
            $config['upload_path']         = './assets/user/img/be/';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['overwrite']          = true;
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo_person')) {
                $this->session->set_flashdata('message', 'Photo Gagal Diupload');
                $google = $this->session->userdata('user_data');
                if ($google) {
                    $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
                } else {
                    $usergoogle = '';
                    $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
                }
                $data = [
                    "title" => "A3MALL | Referral",
                    "page" => "user/referal/formreferal",
                    "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
                    "usergoogle" => $usergoogle,


                ];

                $this->load->view('user/templates/app', $data, FALSE);
            } else {
                $fotodiri = $this->upload->data();
                $data['photo_person'] = $fotodiri['file_name'];
            }
        }
        if (isset($_FILES['photo_ktp']['name'])) {
            $pengaturan['upload_path']         = './assets/user/img/be/ktp/';
            $pengaturan['allowed_types']     = 'gif|jpg|png|jpeg';
            $pengaturan['overwrite']          = true;
            $pengaturan['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($pengaturan);

            if (!$this->upload->do_upload('photo_ktp')) {
                $this->session->set_flashdata('message', 'Photo Gagal Diupload');
                $google = $this->session->userdata('user_data');
                if ($google) {
                    $usergoogle = $this->db->get_where('users', ['email' => $google['email']])->row_array();
                } else {
                    $usergoogle = '';
                    $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
                }
                $data = [
                    "title" => "A3MALL | Referral",
                    "page" => "user/referal/formreferal",
                    "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
                    "usergoogle" => $usergoogle,
                ];

                $this->load->view('user/templates/app', $data, FALSE);
            } else {
                $fotoktp = $this->upload->data();
                $data['photo_ktp'] = $fotoktp['file_name'];
                if ($this->db->insert('form_referal', $data)) {
                    $referal = [
                        // 'code_referal' => strtoupper(implode(" ", array_slice(explode(" ", $name), 0, 1))) . mt_rand(1000, 9999),
                        'users_email_referal' => $email,
                        'level_referal' => 3,
                        'describe' => 'Referal Bussines Executive For Customers'

                    ];


                    //kirim email
                    $config = [
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://mail.atigamall.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'referral@atigamall.com',
                        'smtp_pass' => 'a3;Mall123',
                        'mailtype' => 'html',
                    ];
                    $this->load->library('email');
                    $this->email->initialize($config);
                    $this->load->helpers('url');
                    $this->email->set_newline("\r\n");

                    $this->email->from('referral@atigamall.com');
                    $this->email->to($email);
                    $this->email->subject("Welcome New Business Executive Atiga Mall");
                    $body = $this->load->view('user/referal/email/emailapproval.tpl.php', $data, TRUE);
                    $this->email->message($body);

                    if ($this->email->send()) {
                        $this->db->insert('referal', $referal);
                        $this->db->update('users', ['group' => 5, 'referal' => ''], ['email' => $email]);
                        $word = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 10, 15);
                        $this->db->update('link_formreferal', ['links' => $word], ['id_link' => 1]);
                        $this->session->set_flashdata('message', 'Data Berhasil Di Submit');
                        redirect(base_url('Dashboard'));
                    } else {
                        $this->session->set_flashdata('message', 'Silahkan Coba Lagi');
                        return redirect('FormReferral/' . $links->links);
                    }
                }
            }
        }
    }

    public function addCodeReferal($id)
    {
        $this->form_validation->set_rules('code', 'Code', 'required|min_length[8]|alpha_numeric', [
            'required'  => 'Code tidak boleh kosong.',
            'min_length'  => 'Code kurang dari 8 karakter.',
            'alpha_numeric'  => 'Code tidak boleh menggunakan symbol.',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->index("$('#inputCodeReferal').modal('show');");
        } else {
            $this->db->update('referal', ['code_referal' => $this->input->post('code')], ['id_referal' => $id]);
            redirect('Referral');
        }
    }
}

/* End of file Dashboard.php */
