<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
setlocale(LC_TIME, "id_ID.UTF8");
class Blog_model extends CI_Model
{
    public function getBlog()
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->order_by('created_blog', 'desc');
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