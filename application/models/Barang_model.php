<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getProductByCategory($where)
    {
        $this->db->select('*');
        $this->db->from('product a');
        $this->db->join('category_product b', 'b.id_category=a.category_product', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $this->db->join('photo_product d', 'd.kd_product = a.kd_product');
        $this->db->where('a.category_product', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getProduct()
    {
        $this->db->select('*');
        $this->db->from('product a');
        $this->db->join('category_product b', 'b.id_category=a.category_product', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getProductJoinPhotoByKd($where)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('photo_product', 'photo_product.kd_product=product.kd_product');
        $this->db->where('kd_product', $where);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBarangAjax($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('kd_product', $id);
        $this->db->join('category_product', 'category_product.id_category=product.category_product');
        $query = $this->db->get();
        return $query->row();
    }

    public function editBarang($code, $data)
    {
        $this->db->update('product', $data, ['kd_product' => $code]);
        return $this->db->affected_rows();
    }


    public function getPhotoBarang($where)
    {
        $this->db->select('*');
        $this->db->from('photo_product');
        $this->db->where('kd_product', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }


    //Model Unit
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

    public function getUnitAjax($id)
    {
        $this->db->where('id_unit', $id);
        $query = $this->db->get('unit_product');
        return $query->row();
    }

    public function editUnit($id, $data)
    {
        $this->db->update('unit_product', $data, ['id_unit' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file ModelName.php */