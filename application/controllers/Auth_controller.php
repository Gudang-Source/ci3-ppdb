<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_controller extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Auth_model');
    }
    
    public function verifikasi()
    {
        $input = array(
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass')
        ); 
        $cek = $this->Auth_model->verifyUser($input);
        if ($cek) {
            $this->Auth_model->initSession();
            redirect('admin/dashboard');
        } else {
            $_SESSION['alert_fail'] = 'Username atau password salah.';
            redirect('login');
        }
    }

    public function logout()
    {
        $this->Auth_model->endSession();
        redirect('login');
    }

    public function register()
    {
        $input = array(
            'role_id' => 1,
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass')
        );
        if ($this->Auth_Model->addUser($input))
            redirect('Auth_Controller/?page=login');
    }

    public function updateNewPassword()
    {
        $input = array(
            'username' => $this->input->post('user'),
            'password' => $this->input->post('old_pass'),
        );
        $new_pass = $this->input->post('new_pass');

        $success = $this->Auth_model->updatePasswordUser($input, $new_pass);
        if ($success) {
            $_SESSION['alert'] = 'Password anda berhasil diganti';
            redirect('admin/personal/resetpass');
        } else {
            $_SESSION['alert_fail'] = 'Password gagal diganti. Silahkan pastikan password lama anda benar';
            redirect('admin/personal/resetpass');
        }
    }
}
