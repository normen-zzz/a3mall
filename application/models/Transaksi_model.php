<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function getTransaksi($where)
    {
        $this->db->select('*');
        $this->db->from('transaction a');
        $this->db->join('detail_transaction b', 'b.kd_transaction=a.kd_transaction', 'left');
        $this->db->join('users c', 'c.id=a.users', 'left');
        $this->db->where('b.status', $where);
        $this->db->group_by('b.kd_transaction');
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result();
        // } else {
        //     return false;
        // }
    }
    public function getDetailTransactionWhereCode($code)
    {
        $this->db->select('*');
        $this->db->from('detail_transaction');
        $this->db->where('kd_transaction', $code);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->row();
        // } else {
        //     return false;
        // }
    }

    public function updateStatus($data, $code)
    {
        $this->db->update('detail_transaction', $data, ['kd_transaction' => $code]);
        return $this->db->affected_rows();
    }

    //Midtrans

    public function getAllMidtrans()
    {
        $this->db->select('*');
        $this->db->from('midtrans');
        $this->db->order_by('transaction_time', 'desc');
        return $this->db->get();
    }


    //User

    public function getTransactionCheckout($where)
    {
        $this->db->select('*');
        $this->db->from('transaction a');
        $this->db->join('users b', 'b.email=a.users', 'left');
        $this->db->join('photo_product c', 'c.kd_product=a.code_product');
        $this->db->join('product d', 'd.kd_product=a.code_product');
        $this->db->join('variation_product e', 'e.id_variation=a.variation');
        $this->db->where('a.kd_transaction', $where);
        $this->db->group_by('a.id_transaction');
        return $this->db->get();
        // } else {
        //     return false;
        // }
    }

    public function getDetailTransactionCheckout($where)
    {
        $this->db->select('*');
        $this->db->from('detail_transaction a');
        $this->db->join('users b', 'b.email=a.email_users', 'left');
        $this->db->where('a.kd_transaction', $where);
        return $this->db->get();
        // } else {
        //     return false;
        // }
    }

    //For Status.php

    public function getDetailTransactionByUserUnpaid($where)
    {
        $this->db->select('*');
        $this->db->from('detail_transaction a');
        $this->db->join('users b', 'b.email=a.email_users', 'left');
        $this->db->where('a.email_users', $where);
        $this->db->where('a.status', 1);
        return $this->db->get();
    }

    public function getDetailTransactionByUserPaid($where)
    {
        $this->db->select('*');
        $this->db->from('detail_transaction a');
        $this->db->join('users b', 'b.email=a.email_users', 'left');
        $this->db->where('a.email_users', $where);
        $this->db->where('a.status', 2);
        return $this->db->get();
    }

    public function getDetailTransactionByUserOnProgress($where)
    {
        $this->db->select('*');
        $this->db->from('detail_transaction a');
        $this->db->join('users b', 'b.email=a.email_users', 'left');
        $this->db->where('a.email_users', $where);
        $this->db->where('a.status', 3);
        return $this->db->get();
    }

    public function getDetailTransactionByUserDone($where)
    {
        $this->db->select('*');
        $this->db->from('detail_transaction a');
        $this->db->join('users b', 'b.email=a.email_users', 'left');
        $this->db->where('a.email_users', $where);
        $this->db->where('a.status', 4);
        return $this->db->get();
    }

    public function getTransactionByDetailTransaction($user)
    {
        $this->db->select('a.*,d.photo_product,e.name_variation,c.name_product,c.price_product');
        $this->db->from('transaction a');
        $this->db->join('users b', 'b.email=a.users', 'left');
        $this->db->join('product c', 'c.kd_product=a.code_product', 'left');
        $this->db->join('photo_product d', 'd.variation_product=a.variation', 'left');
        $this->db->join('variation_product e', 'e.id_variation=a.variation', 'left');
        $this->db->where('a.users', $user);
        return $this->db->get();
        // } else {
        //     return false;
        // }
    }
}

/* End of file ModelName.php */