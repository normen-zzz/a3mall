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
        $this->db->join('brand_product d', 'd.id_brand=a.brand_product', 'left');
        $this->db->where('a.category_product', $where);
        $this->db->order_by('a.id_product', 'desc');
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getCategory()
    {
        $this->db->select('*');
        $this->db->from('category_product');
        $this->db->order_by('created_category', 'desc');
        return $this->db->get();
    }
    //ajax
    public function getCategoryAjax($id)
    {
        $this->db->select('*');
        $this->db->from('category_product');
        $this->db->where('id_category', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function editCategory($id, $data)
    {
        $this->db->update('category_product', $data, ['id_category' => $id]);
        return $this->db->affected_rows();
    }
    public function getBrand()
    {
        $this->db->select('*');
        $this->db->from('brand_product');
        $this->db->order_by('created_brand', 'desc');
        return $this->db->get();
    }

    //ajax
    public function getBrandAjax($id)
    {
        $this->db->select('*');
        $this->db->from('brand_product');
        $this->db->where('id_brand', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function editBrand($id, $data)
    {
        $this->db->update('brand_product', $data, ['id_brand' => $id]);
        return $this->db->affected_rows();
    }

    public function getProductByCategoryJoinPhoto($where)
    {
        $this->db->select('*');
        $this->db->from('product a');
        $this->db->join('category_product b', 'b.id_category=a.category_product', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $this->db->join('photo_product d', 'd.kd_product = a.kd_product');
        $this->db->join('brand_product e', 'e.id_brand=a.brand_product', 'left');
        $this->db->where('a.category_product', $where);
        $this->db->group_by('d.kd_product');
        $this->db->order_by('a.date_arrived', 'desc');
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getProductByRand()
    {
        $this->db->select('*');
        $this->db->from('product a');
        $this->db->join('category_product b', 'b.id_category=a.category_product', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $this->db->join('photo_product d', 'd.kd_product = a.kd_product');
        $this->db->join('brand_product e', 'e.id_brand = a.brand_product');
        $this->db->group_by('a.kd_product');
        $this->db->order_by('rand()');
        $this->db->limit(4);
        return $this->db->get();
    }

    public function getProductByKd($where)
    {
        $this->db->select('*');
        $this->db->from('product a');
        $this->db->join('category_product b', 'b.id_category=a.category_product', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $this->db->join('photo_product d', 'd.kd_product = a.kd_product');
        $this->db->where('a.kd_product', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->row();
        // } else {
        //     return false;
        // }
    }

    public function getProductBySlug($where)
    {
        $this->db->select('*');
        $this->db->from('product a');
        $this->db->join('category_product b', 'b.id_category=a.category_product', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $this->db->join('photo_product d', 'd.kd_product = a.kd_product');
        $this->db->join('brand_product e', 'e.id_brand = a.brand_product');
        $this->db->where('a.slug_product', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->row();
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

    public function getPhoto()
    {
        $this->db->select('*');
        $this->db->from('photo_product');
        $this->db->group_by('kd_product');
        return $this->db->get();
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
        $this->db->join('brand_product', 'brand_product.id_brand=product.brand_product');
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
        $this->db->where('photo_product.kd_product', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getPhotoBarangBySlug($where)
    {
        $this->db->select('*');
        $this->db->from('photo_product');
        $this->db->join('product', 'product.kd_product=photo_product.kd_product');
        $this->db->where('product.slug_product', $where);
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

    public function getUnitByCodeProductDeskripsi($where)
    {

        $this->db->select('*');
        $this->db->from('unit_product a');
        $this->db->join('users b', 'b.id=a.users', 'left');
        $this->db->where('a.kd_product', $where);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
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

    //Variation
    public function getVariationBarang($where)
    {
        $this->db->select('*');
        $this->db->from('variation_product');
        $this->db->where('kd_product', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getVariationUnit()
    {
        $this->db->select('*');
        $this->db->from('variation_product');
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getVariationUnitWhere($where)
    {
        $this->db->select('*');
        $this->db->from('variation_product');
        $this->db->where('kd_product', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getVariationAjax($code)
    {
        $this->db->select('*');
        $this->db->from('variation_product');
        $this->db->where('id_variation', $code);
        $query = $this->db->get();
        return $query->row();
    }

    public function editVariation($id, $data)
    {
        $this->db->update('variation_product', $data, ['id_variation' => $id]);
        return $this->db->affected_rows();
    }

    //Untuk User

    public function getSejenis($like, $except)
    {
        $this->db->select('*');
        $this->db->from('product a');
        $this->db->join('category_product b', 'b.id_category=a.category_product', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $this->db->join('photo_product d', 'd.kd_product = a.kd_product');
        $this->db->join('brand_product e', 'e.id_brand = a.brand_product');
        $this->db->like('a.brand_product', $like);
        $this->db->where_not_in('a.slug_product', $except);
        $this->db->group_by('a.kd_product');
        $this->db->limit(4);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result();
    }

    public function getNewArrival($where)
    {
        $this->db->select('*');
        $this->db->from('product a');
        $this->db->join('category_product b', 'b.id_category=a.category_product', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $this->db->join('photo_product d', 'd.kd_product = a.kd_product');
        $this->db->join('brand_product e', 'e.id_brand = a.brand_product');
        $this->db->limit(4);
        $this->db->order_by('a.date_arrived', 'desc');
        $this->db->where('a.category_product', $where);
        $this->db->group_by('a.kd_product');
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result();
    }

    public function getMaxPriceFromVariation($where)
    {
        $this->db->select_max('price_variation', 'max_price');
        $this->db->from('variation_product');
        $this->db->where('kd_product', $where);
        return $this->db->get();
    }

    public function getMinPriceFromVariation($where)
    {
        $this->db->select_min('price_variation', 'min_price');
        $this->db->from('variation_product');
        $this->db->where('kd_product', $where);
        return $this->db->get();
    }
}

/* End of file ModelName.php */