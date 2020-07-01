<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulir_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Formulir_model');
        $this->load->model('Auth_model');
    }

    public function addFormulir()
    {
        $form_id = $this->Formulir_model->insertAllData();
        
        if ($this->Auth_model->isLoggedIn()) {
            $_SESSION['alert'] = 'Formulir telah dikirim, kode pendaftaran anda adalah ' . $form_id;
            redirect('admin/formulir/buat');
        }
        else {
            $_SESSION['alert'] = 'Formulir telah dikirim, kode pendaftaran anda adalah ' . $form_id . '. Mohon catat kode ini untuk melihat hasil penerimaan.';
            redirect('pendaftaran');
        }
    }

    public function confirmFormulir()
    {
        $form_id = $this->input->post('kode_formulir');
        $status = 'Telah Dikonfirmasi';
        $updated = $this->Formulir_model->updateStatusFormulir($form_id, $status);
        if ($updated) {
            $_SESSION['alert'] = 'Formulir telah dikonfirmasi.';
            redirect('admin/formulir/masuk');
        }
    }

}
?>