<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Formulir_model');
        $this->load->model('Penerimaan_model');
    }
    
    public function diterima()
    {
        $status = 'Diterima';
        $form_id = $this->input->post('form_id');
        $updated = $this->Formulir_model->updateStatusFormulir($form_id, $status);
        $moved = $this->Penerimaan_model->copyRowFormulir($form_id);
        if ($updated) {
            $_SESSION['alert'] = 'Peserta didik telah diterima.';
            redirect('admin/penerimaan/dikonfirmasi');
        }
        else
            return var_dump($form_id);
    }

    public function ditolak()
    {
        $status = 'Ditolak';
        $form_id = $this->input->post('form_id');
        $updated = $this->Formulir_model->updateStatusFormulir($form_id, $status);
        if ($updated) {
            $_SESSION['alert'] = 'Peserta didik telah ditolak.';
            redirect('admin/penerimaan/dikonfirmasi');
        }
        else
            return var_dump($form_id);
    }    
}
