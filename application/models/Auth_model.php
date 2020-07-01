<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model 
{
    protected $username;
    protected $password;

    public function updatePasswordUser($input, $new_pass)
    {
        $new_hashed_pass = $this->hashPassword($new_pass);
        if ($this->verifyUser($input)) {
            $this->db->set('password', $new_hashed_pass);
            $this->db->where('username', $input['username']);
            return $this->db->update('users');
        } 
    }

    public function hashPassword($str)
    {
        return password_hash($str, PASSWORD_BCRYPT, ['cost' => 8]);
    }

	public function verifyUser($data_input)
    {
        $stored_data = $this->getUserByUsername($data_input['username']);
        $data = array(
            'username' => $stored_data['username'],
            'password' => $stored_data['password']
        );
        $this->setStoredData($data);
        return $this->cekPassword($data_input['password']);
    }

    public function getUserByUsername($username)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->from('users');
        $query = $this->db->get();
        return $query->row_array();
    }

    protected function setStoredData($data = [])
    {
        $this->username = $data['username'];
        $this->password = $data['password'];
    }

    public function cekPassword($input_pass)
    {
        $hashed_pass = $this->password;
        return password_verify($input_pass, $hashed_pass);
    }

    protected function getStoredData()
    {
        $data = array(
            'username' => $this->username,
            'password' => $this->password
        );
        return $data;
    }

    public function initSession()
    {
        $username = $this->username;
        $stored = $this->getUserByUsername($username);
        $_SESSION['id'] = $stored['id'];
        $_SESSION['username'] = $stored['username'];
        $_SESSION['role'] = $stored['role_id'];
        $_SESSION['nama'] = $stored['nama'];
        $_SESSION['email'] = $stored['email'];
        $_SESSION['logged_in'] = TRUE;
    }

    public function endSession()
    {
        $_SESSION = array();
        session_destroy();
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['logged_in']))
            return TRUE;
        else
            return FALSE;
    }    
}
