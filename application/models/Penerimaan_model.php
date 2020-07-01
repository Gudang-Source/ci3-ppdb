<?php
defined('BASEPATH') OR exit('No direct scripts allowed');

class Penerimaan_model extends CI_Model
{

    public function fetchAllConfirmed()
    {
        $this->db->select('f.status, f.create_date, s.id as siswa_id, s.formulir_id, s.nama_lengkap,
                           s.alamat');
        $this->db->from('formulir as f');
        $this->db->join('siswa as s', 'f.id = s.formulir_id');
        $this->db->where('status', 'Telah Dikonfirmasi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchPresensiSiswa()
    {
        $this->db->select('s.nama_lengkap, tk.nama');
        $this->db->from('formulir as f');
        $this->db->join('siswa as s', 'f.id = s.formulir_id');
        $this->db->join('asal_sekolah as tk', 's.asal_sekolah_id = tk.id');
        $this->db->where('f.status', 'Telah Dikonfirmasi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchArsipPenerimaanDiterima()
    {
        $this->db->select('d.id as formulir_id, d.status, s.nama_lengkap, s.alamat');
        $this->db->from('form_diterima as d');
        $this->db->join('siswa as s', 'd.id = s.formulir_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchArsipPenerimaanDitolak()
    {
        $this->db->select('f.id as formulir_id, f.status, s.nama_lengkap, s.alamat');
        $this->db->from('formulir as f');
        $this->db->join('siswa as s', 'f.id = s.formulir_id');
        $this->db->where('status', 'Ditolak');
        $query = $this->db->get();
        return $query->result_array();
    }
  
    public function fetchHasilPenerimaan($id)
    {
        $this->db->select('*');
        $this->db->from('formulir as f');
        $this->db->join('siswa as s', 'f.id = s.formulir_id');
        $this->db->where('f.id', $id);
        $this->db->or_like('s.nama_lengkap', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function copyRowFormulir($form_id)
    {
        $this->db->select('*');
        $this->db->where('id', $form_id);
        $this->db->from('formulir');
        $select = $this->db->get();
        if ($select->num_rows())
            return $this->db->insert('form_diterima', $select->row_array());
        else
            return FALSE;
    }
}


?>