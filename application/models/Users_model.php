<?php
class Users_model extends CI_Model
{
    public function fetchAllUsers() 
    {
        $this->db->select('id, nama, username, email');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function resetPassUser($data)
    {
        $this->db->set('password', $data['password']);
        $this->db->where('id', $data['id']);
        return $this->db->update('users');
    }

    public function deleteUser($userid)
    {
        $this->db->where('id', $userid);
        return $this->db->delete('users');
    }

    public function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }
}

?>