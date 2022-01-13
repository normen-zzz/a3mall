<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Barang_model', 'barang');
    
  }

  public function index()
  {
    $barang = $this->barang->get_all();

    $data = [
      "title" => "Data Barang",
      "page" => "barang/index",
      "data" => $barang
    ];

    $this->load->view('templates/app', $data, FALSE);
      
  }

  private function __validate()
  {
    $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required', [
      "required" => "Kode Barang harus diisi!"
    ]);
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required', [
      "required" => "Nama Barang harus diisi!"
    ]);
    $this->form_validation->set_rules('harga', 'Harga Barang', 'trim|required', [
      "required" => "Harga Barang harus diisi!"
    ]);
   
  }

  public function add()
  {
    $this->__validate();

    $config['upload_path'] = './images/';
    $config['allowed_types'] = 'gif|jpg|png';
    // $config['max_size']  = '100';
    // $config['max_width']  = '1024';
    // $config['max_height']  = '768';

    $this->load->library('upload', $config);
    // gambar 1
   
    if (!empty($_FILES['gambar1'])) {
      $this->upload->do_upload('gambar1');
      $data1 = $this->upload->data();
      $gambar1 = $data1['file_name'];
    }

    // gambar2
    if (!empty($_FILES['gambar2'])) {
      $this->upload->do_upload('gambar2');
      $data2 = $this->upload->data();
      $gambar2 = $data2['file_name'];
    }

    if ($this->form_validation->run() == FALSE) {
      $data = [
        "title" => "Data Barang",
        "page" => "barang/add",
      ];

      $this->load->view('templates/app', $data, FALSE);
    } else {
      $data = [
        "kode_barang" => $this->input->post('kode_barang'),
        "nama_barang" => $this->input->post('nama_barang'),
        "harga" => $this->input->post('harga'),
        "gambar1" => $gambar1,
        "gambar2" => $gambar2,
      ];

      // var_dump($data);
      // exit();

      $this->barang->insert($data);
      $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Create record success!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
      redirect("Barang");
    }  
   
  }

  public function update($id)
  {
    $this->__validate();

    $config['upload_path'] = './images/';
    $config['allowed_types'] = 'gif|jpg|png';
    // $config['max_size']  = '100';
    // $config['max_width']  = '1024';
    // $config['max_height']  = '768';

    $this->load->library('upload', $config);
    // gambar 1

    if (!empty($_FILES['gambar1'])) {
      $this->upload->do_upload('gambar1');
      $data1 = $this->upload->data();
      $gambar1 = $data1['file_name'];
    }

    // gambar2
    if (!empty($_FILES['gambar2'])) {
      $this->upload->do_upload('gambar2');
      $data2 = $this->upload->data();
      $gambar2 = $data2['file_name'];
    }

  
    if ($this->form_validation->run() == FALSE) {
      $data = [
        "title" => "Data Barang",
        "page" => "barang/edit",
        "data" => $this->barang->getById($id)
      ];

      $this->load->view('templates/app', $data, FALSE);
    } else {
      $data = [
        "kode_barang" => $this->input->post('kode_barang'),
        "nama_barang" => $this->input->post('nama_barang'),
        "harga" => $this->input->post('harga'),
        "gambar1" => $gambar1,
        "gambar2" => $gambar2,
      ];

      $old1 = $this->input->post('gambarlama1');
      $old2 = $this->input->post('gambarlama2');
      // var_dump($data);
      // exit();
      // var_dump($old1);
      // exit();

      $path = './images/' . $old1;
      unlink($path);

      $path2 = './images/' . $old2;
      unlink($path2);

      $this->barang->update($this->input->post('no'), $data);
      $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Edit record success!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
      redirect("Barang");
    }
  }

  public function delete($id)
  {
    $row = $this->barang->getById($id);
    $old1 = $row->gambar1;
    $old2 = $row->gambar2;
   
    $path = './images/' . $old1;
    unlink($path);

    $path2 = './images/' . $old2;
    unlink($path2);

    if ($row) {
     
      $this->barang->delete($id);
      $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Delete record success!</div>');
      redirect(site_url('barang'));
    } else {
      $this->session->set_flashdata('error', 'Record Not Found');
      redirect(site_url('barang'));
    }
  }

  
}


/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */