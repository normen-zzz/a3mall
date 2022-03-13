<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Popup_model extends CI_Model
{
    public function getPopup()
    {
        $this->db->select('*');
        $this->db->from('popup');
        return $this->db->get();
    }
}

/* End of file ModelName.php */