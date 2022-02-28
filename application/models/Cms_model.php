<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
setlocale(LC_TIME, "id_ID.UTF8");
class Cms_model extends CI_Model
{
    public function getCarousel()
    {
        $this->db->select('*');
        $this->db->from('carousel');
        return $this->db->get();
    }
}

/* End of file ModelName.php */