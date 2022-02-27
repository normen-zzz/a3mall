<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand_model extends CI_Model
{
    public function getProductBrand($name)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('brand_product', 'brand_product.id_brand=product.brand_product', 'left');
        $this->db->join('photo_product', 'photo_product.kd_product=product.kd_product', 'left');
        $this->db->join('category_product', 'category_product.id_category=product.category_product', 'left');
        $this->db->where('brand_product.name_brand', $name);
        $this->db->order_by('created_brand', 'desc');
        $this->db->group_by('photo_product.kd_product');
        return $this->db->get();
    }
    public function getBlogAjax($id)
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('id_blog', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getBlogWhere($slug)
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('slug_blog', $slug);
        $this->db->order_by('created_blog', 'desc');
        return $this->db->get();
    }

    public function getBlogSejenis($except)
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where_not_in('slug_blog', $except);
        $this->db->limit(3);
        $this->db->order_by('rand()');

        return $this->db->get();
    }
}

/* End of file ModelName.php */