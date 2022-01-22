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
        $this->db->where('b.status_bayar', $where);
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result();
        // } else {
        //     return false;
        // }
    }
}

/* End of file ModelName.php */