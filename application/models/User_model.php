<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function setPassword($email, $data)
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
        $this->db->from('alamat a');
        $this->db->join('provinsi b', 'b.id=a.provinsi_alamat', 'left');
        $this->db->join('kabupaten c', 'c.id=a.kabupaten_alamat', 'left');
        $this->db->join('kecamatan d', 'd.id=a.kecamatan_alamat', 'left');
        $this->db->join('kelurahan e', 'e.id=a.kelurahan_alamat', 'left');
        $this->db->where('a.email', $email);
        $this->db->order_by('a.id_alamat', 'desc');
        return $this->db->get();
    }
}

/* End of file ModelName.php */