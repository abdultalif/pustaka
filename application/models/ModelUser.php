<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'role.id = user.role_id');
        $this->db->limit(10, 0);
        return $this->db->get();
    }

    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'role.id = user.role_id');
        return $this->db->get();
    }
}
