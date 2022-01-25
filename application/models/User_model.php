<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function setPassword($email, $data)
    {
        $this->db->update('users', $data, ['email' => $email]);
        return $this->db->affected_rows();
    }
}

/* End of file ModelName.php */