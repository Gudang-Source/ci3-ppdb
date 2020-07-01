<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {
    
    public function insertKonten($data)
    {
        return $this->db->insert('berita', $data);
    }

    public function insertFileImages($detail_file)
    {
        return $this->db->insert('file_upload', $detail_file);
    }

    public function updateKonten($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('berita', $data);
    }

    public function deleteKonten($id_berita)
    {
        $this->db->where('id', $id_berita);
        return $this->db->delete('berita');
    }

    public function fetchActiveContent($section_id)
    {
        $this->db->select('konten');
        $this->db->from('berita');
        $this->db->where('section_id', $section_id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function fetchAllContentBySection($section_id)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('section_id', $section_id);
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getKontenById($id_konten)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id', $id_konten);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAllKonten()
    {
        $this->db->select('b.id, b.judul, b.status, b.author, b.last_update, s.nama');
        $this->db->from('berita as b');
        $this->db->join('section as s', 's.id = b.section_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBeritaIdBy($judul)
    {
        $this->db->select('id');
        $this->db->from('berita');
        $this->db->where('judul', $judul);
        $query = $this->db->get();
        return $query->row_array();
    }

}
