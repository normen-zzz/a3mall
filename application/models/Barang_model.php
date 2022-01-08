<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

  public function insert($data)
  {
    $this->db->insert('barang', $data);
  }

  public function get_all()
  {
    $this->db->select('*');
    return $this->db->get('barang')->result();
  }

  // get data by id
  public function getById($id)
  {
    $this->db->select('*');
    $this->db->where('no', $id);
    return $this->db->get('barang')->row();
  }

  // update data
  public function update($id, $data)
  {
    $this->db->where('no', $id);
    $this->db->update('barang', $data);
  }

  // delete data
  public function delete($id)
  {
    $this->db->where('no', $id);
    $this->db->delete('barang');
  }

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */