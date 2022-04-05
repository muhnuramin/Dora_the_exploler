<?php
class User_model extends CI_model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }
    public function getUserById($id)
    {
        $return = $this->db->get_where('user', ['user_id' => $id]);
        if ($return->num_rows() > 0) {
            return $return->row_array();
        } else {
            return false;
        }
    }
    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
