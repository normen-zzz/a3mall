<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


    public function getAdministrator()
    {
        $this->db->select('*');
        $this->db->from('users a');
        $this->db->join('groups b', 'b.id=a.group', 'left');
        $this->db->where_not_in('a.group', 2);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->result_array();
        // } else {
        //     return false;
        // }
    }

    public function getAdministratorWhere($where)
    {
        $this->db->select('*');
        $this->db->from('users a');
        $this->db->where('email', $where);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query->row();
        // } else {
        //     return false;
        // }
    }
    public function getGroup()
    {
        $this->db->select('*');
        $this->db->from('groups a');
        $this->db->where_not_in('a.id', 2);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        // if ($query->num_rows() != 0) {
        return $query;
        // } else {
        //     return false;
        // }
    }

    public function getAdminAjax($email)
    {
        $this->db->select('*', 'id.groups as id_groups');
        $this->db->from('users');
        $this->db->join('groups', 'groups.id = users.group');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row();
    }

    public function editAdmin($email, $data)
    {
        $this->db->update('users', $data, ['email' => $email]);
        return $this->db->affected_rows();
    }

    public function addAdmin($data)
    {
        return $this->db->insert('users', $data);
    }

    //Group
    public function getGroupAjax($id)
    {
        $this->db->select('*');
        $this->db->from('groups');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function editGroup($id, $data)
    {
        $this->db->update('groups', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file ModelName.php */