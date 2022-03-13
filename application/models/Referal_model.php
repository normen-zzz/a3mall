<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Referal_model extends CI_Model
{

    public function getReferalBE($email)
    {
        $this->db->select('*');
        $this->db->from('referal');
        $this->db->where('users_email_referal', $email);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function getReferalEmail($email)
    {
        $this->db->select('*');
        $this->db->from('referal');
        $this->db->where('users_email_referal', $email);
        return $this->db->get();
    }

    public function getCustomerOnReferal($referal)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('referal', $referal);
        $this->db->order_by('created_on', 'desc');
        return $this->db->get();
    }

    public function getReferal($referal)
    {
        $this->db->select('*');
        $this->db->from('referal');
        $this->db->where('code_referal', $referal);
        return $this->db->get();
    }

    public function getBusinessEx($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        return $this->db->get();
    }
}

/* End of file ModelName.php */