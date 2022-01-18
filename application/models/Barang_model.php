<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getProductByCategory($table, $where)
    {
        $this->db->select('*');
        $this->db->from('product a');
        $this->db->join('category_product b', 'b.id_category=a.category_product', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $this->db->where('a.category_product', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getUnitByCodeProduct($where)
    {

        $this->db->select('*');
        $this->db->from('unit_product a');
        $this->db->join('users b', 'b.id=a.users', 'left');
        $this->db->where('a.kd_product', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }
}

/* End of file ModelName.php */