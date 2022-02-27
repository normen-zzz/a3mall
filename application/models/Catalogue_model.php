<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalogue_model extends CI_Model
{
    public function getCatalogueAjax($id)
    {
        $this->db->select('*');
        $this->db->from('catalogue');
        $this->db->where('id_catalogue', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getDetailCatalogueAjax($id)
    {
        $this->db->select('*');
        $this->db->from('detail_catalogue');
        $this->db->where('id_detail_catalogue', $id);
        $query = $this->db->get();
        return $query->row();
    }
}

/* End of file ModelName.php */