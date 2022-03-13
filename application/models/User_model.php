<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function setPassword($email, $data)
    {
        $this->db->update('users', $data, ['email' => $email]);
        return $this->db->affected_rows();
    }
    public function setReferal($email, $data)
    {
        $this->db->update('users', $data, ['email' => $email]);
        return $this->db->affected_rows();
    }

    public function getProfileAjax($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function editUser($email, $data)
    {
        $this->db->update('users', $data, ['email' => $email]);
        return $this->db->affected_rows();
    }

    public function getAlamatByEmail($email)
    {
        $this->db->select('*');
        $this->db->from('alamat');
        $this->db->where('email', $email);
        $this->db->order_by('id_alamat', 'desc');
        return $this->db->get();
    }

    public function getAlamatAjax($id)
    {
        $this->db->select('*');
        $this->db->from('alamat');
        $this->db->where('email', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function check_databse($str)
    {
        $this->db->select('*');
        $this->db->from('referal');
        $this->db->where('code_referal', $str);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

/* End of file ModelName.php */