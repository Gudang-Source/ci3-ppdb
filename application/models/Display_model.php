<?php
defined('BASEPATH') OR exit('No direct scripts allowed');

class Display_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Settings_model');
    }
    public function fetchAllCarousel()
    {
        $this->db->select('nama, caption');
        $this->db->from('file_asset');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchAllTanggal()
    {
        $this->db->select('*');
        $this->db->from('setting_tanggal');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function fetchAllDocs()
    {
        $this->db->select('*');
        $this->db->from('file_upload');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchAllContacts()
    {
        $this->db->select('*');
        $this->db->from('setting_kontak');
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function getAndFormatTanggal()
    {
        $tanggal = $this->fetchAllTanggal();
        $tanggal['daftar_mulai'] = $this->Settings_model->formatAsLocalDate($tanggal['daftar_mulai']);
        $tanggal['daftar_akhir'] = $this->Settings_model->formatAsLocalDate($tanggal['daftar_akhir']);
        $tanggal['penjajagan'] = $this->Settings_model->formatAsLocalDate($tanggal['penjajagan']);
        $tanggal['heregistrasi_mulai'] = $this->Settings_model->formatAsLocalDate($tanggal['heregistrasi_mulai']);
        $tanggal['heregistrasi_akhir'] = $this->Settings_model->formatAsLocalDate($tanggal['heregistrasi_akhir']);
        $tanggal['belajar_perdana'] = $this->Settings_model->formatAsLocalDate($tanggal['belajar_perdana']);
        return $tanggal;
    }

    public function shiftStatus($data)
    {
        foreach ($data as &$value) {
            $value['status'] = $this->getStatus($value['status']);
        }
        return $data;
    }

    public function getStatus($status)
    {
        if ($status === '1')
            return "Aktif";
        else
            return "Tidak Aktif";
    }

    public function countDataFormulir($status)
    {
        $this->db->where('status', $status);
        $this->db->from('formulir');
        return $this->db->count_all_results();
    }

    public function countAllFormulir() 
    {
        $this->db->select('*');
        $this->db->from('formulir');
        return $this->db->count_all_results();
    }

    public function fetchRecentFormulir()
    {
        $this->db->select('f.id, f.status, f.create_date, s.nama_lengkap');
        $this->db->from('formulir as f');
        $this->db->join('siswa as s', 's.formulir_id = f.id');
        $this->db->where('status', 'Belum Konfirmasi');
        $this->db->order_by('f.create_date', 'DESC');
        $this->db->limit(25);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>