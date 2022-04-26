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

    public function getNpwpBe($email)
    {
        $this->db->select('*');
        $this->db->from('npwp_be');
        $this->db->where('email_npwp', $email);
        return $this->db->get();
    }

    public function getAllPajak()
    {
        $this->db->select('*');
        $this->db->from('tax_be');
        $this->db->order_by('id_tax', 'desc');
        return $this->db->get();
    }

    public function getIncomeReferal($code)
    {
        $this->db->select('*');
        $this->db->from('income_referal');
        $this->db->where('referal', $code);
        $this->db->order_by('id_income', 'desc');
        return $this->db->get();
    }

    public function getIncomeOrderReferal($users)
    {
        $this->db->select('*');
        $this->db->from('incomeorder_referal');
        $this->db->where('email', $users);
        $this->db->order_by('id_incomeorder', 'desc');
        return $this->db->get();
    }


    public function getSumIncomeReferal($code)
    {
        $this->db->select_sum('total_income');
        $this->db->from('income_referal');
        $this->db->where('referal', $code);
        return $this->db->get();
    }

    public function getCountIncomeReferal($code)
    {
        $this->db->select('*');
        $this->db->from('income_referal');
        $this->db->where('referal', $code);
        $q = $this->db->get();
        $count = $q->result();
        return count($count);
    }



    public function getSumIncomeOrderReferal($users)
    {
        $this->db->select_sum('total_income');
        $this->db->from('incomeorder_referal');
        $this->db->where('email', $users);
        return $this->db->get();
    }

    public function getCountIncomeOrderReferal($users)
    {
        $this->db->select('*');
        $this->db->from('incomeorder_referal');
        $this->db->where('email', $users);
        $q = $this->db->get();
        $count = $q->result();
        return count($count);
    }

    //Gauges
    public function getOmsetIncomeMonthReferal($referal)
    {

        $this->db->select('SUM(total_transaction - ongkir) As total');
        $this->db->from('detail_transaction');
        $this->db->join('income_referal', 'income_referal.kd_transaction=detail_transaction.kd_transaction', 'left');
        $this->db->where('MONTH(date_transaction)', date('m')); //For current month
        $this->db->where('YEAR(date_transaction)', date('Y')); // For current year
        $this->db->where('income_referal.referal', $referal); // For current year
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function getOmsetIncomeYearReferal($referal)
    {

        $this->db->select('SUM(total_transaction - ongkir) As total');
        $this->db->from('detail_transaction');
        $this->db->join('income_referal', 'income_referal.kd_transaction=detail_transaction.kd_transaction', 'left');
        $this->db->where('YEAR(date_transaction)', date('Y')); // For current year
        $this->db->where('income_referal.referal', $referal); // For current year
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function getOmsetIncomeOrderMonthReferal($email)
    {

        $this->db->select('SUM(total_transaction - ongkir) As total');
        $this->db->from('detail_transaction');
        $this->db->where('MONTH(date_transaction)', date('m')); //For current month
        $this->db->where('YEAR(date_transaction)', date('Y')); // For current year
        $this->db->where('email_users', $email); // For current year
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function getOmsetIncomeOrderYearReferal($email)
    {
        $this->db->select('SUM(total_transaction - ongkir) As total');
        $this->db->from('detail_transaction');
        $this->db->where('YEAR(date_transaction)', date('Y')); // For current year
        $this->db->where('email_users', $email); // For current year
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
}

/* End of file ModelName.php */