<?php

class Roles_model extends CI_Model
{
    public function jsonGetRoles()
    {
        $this->db->not_like('nama_role', 'Admin');
        $this->db->not_like('nama_role', 'Pimpinan');

        return $this->db->get('roles')->result_array();
    }
}
