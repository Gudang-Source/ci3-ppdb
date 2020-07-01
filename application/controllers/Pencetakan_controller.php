<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencetakan_controller extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        
        $this->load->model('Formulir_model');
        $this->load->model('Penerimaan_model');
        $this->load->model('Settings_model');
        $this->load->library('pdf');
    }
    
    public function cetakFormulirSiswa()
    {
        $form_id = $this->uri->segment(4);
        $data = $this->Formulir_model->fetchFormulirDetail($form_id);
        $data['create_date'] = $this->Settings_model->formatAsLocalDate($data['create_date']);
        $data['tanggal_lahir'] = $this->Settings_model->formatLongDate($data['tanggal_lahir']);

        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->set_option('isPhpEnabled', TRUE);
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "formulir_$form_id.pdf";
        $this->pdf->load_view('admin/cetak_formulir', ['bio' => $data]);
    }

    public function cetakPresensiSiswa()
    {
        $data = $this->Penerimaan_model->fetchPresensiSiswa();

        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->set_option('isPhpEnabled', TRUE);
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "presensi.pdf";
        $this->pdf->load_view('admin/cetak_presensi', ['daftar_nama' => $data]);
    }
}
