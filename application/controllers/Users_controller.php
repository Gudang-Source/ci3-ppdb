<?php
    defined('BASEPATH') OR exit('No direct scripts access allowed');

    class Users_controller extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('Users_model');
            $this->load->model('Auth_model');
        }

        public function addUser()
        {
            $hashed_pass = $this->Auth_model->hashPassword($this->input->post('pass'));
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'password' => $hashed_pass
            );

            $this->Users_model->insertUser($data);

            $_SESSION['alert'] = 'Pengguna ' . $data['username'] . ' telah ditambahkan ';
            redirect('admin/users/create');
        }

        public function resetPass()
        {
            $hashed_pass = $this->Auth_model->hashPassword($this->input->post('new_pass'));
            $data = array(
                'id' => $this->input->post('userid'),
                'password' => $hashed_pass
            );
            if ($data['id'] != 1) {
                $this->Users_model->resetPassUser($data);
                $_SESSION['alert'] = 'Password user telah diubah.';
                redirect('admin/users/list');
            } else {
                $_SESSION['alert_fail'] = 'Password user root tidak boleh diubah.';
                redirect('admin/users/list');
            }
        }

        public function deleteUser()
        {
            $id = $this->input->post('userid');
            if ($id != 1) {
                $this->Users_model->deleteUser($id);
                $_SESSION['alert'] = 'User telah di hapus.';
                redirect('admin/users/list');
            } else {
                $_SESSION['alert_fail'] = 'User root tidak boleh dihapus.';
                redirect('admin/users/list');
            }
        }
    }
?>