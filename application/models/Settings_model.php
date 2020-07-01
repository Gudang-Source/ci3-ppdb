<?php
defined('BASEPATH') OR exit('No direct scripts allowed');

class Settings_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getNowTimeJakarta($format)
    {
        $now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        return $now->format($format);
    }

    public function formatAsLocalDate($input)
    {
        $date = new DateTime($input);
        $time = new IntlDateFormatter(
            'id_ID',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN
        );
        return $time->format($date);
    }

    public function formatLongDate($input)
    {
        $date = new DateTime($input);
        $time = new IntlDateFormatter(
            'id_ID',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN
        );
        return $time->format($date);
    }

    public function configUpload($path, $types)
    {
        $config = array(
            'upload_path' => $path,
            'allowed_types' => $types,
            'max_size' => '10240',
            'max_filename' => '255',
            'file_ext_tolower' => TRUE,
            'overwrite' => TRUE
        );
        /*
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|doc|odt|jpg|jpeg|png';
        $config['max_size'] = '10240';
        $config['max_filename'] = '255';
        $config['overwrite'] = TRUE;
        */
        return $config;
    }

    public function fetchAllContentBySection($section_id)
    {
        $this->db->select('id, judul, status');
        $this->db->from('berita');
        $this->db->where('section_id', $section_id);
        $this->db->order_by('status', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchDateSettings()
    {
        $this->db->select('*');
        $this->db->from('setting_tanggal');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function fetchContactSettings()
    {
        $this->db->select('*');
        $this->db->from('setting_kontak');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function fetchAllFileDocs()
    {
        $this->db->select('*');
        $this->db->from('file_upload');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchAllCarousel()
    {
        $this->db->select('*');
        $this->db->from('file_asset');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getStatusPendaftaran()
    {
        $format = 'Y-m-d';
        $now = $this->Settings_model->getNowTimeJakarta($format);
        $date = $this->Settings_model->fetchDateSettings();

        if ($now >= $date['daftar_mulai'] && $now <= $date['daftar_akhir'])
            return ['status' => 'Dibuka'];
        else
            return ['status' => 'Ditutup'];
    }

    public function updateStatusSyarat($id)
    {
        $section_ids = array(2, 3);
        if($this->deactivateNotIn($section_ids))
            return $this->activateSelectedBerita($id);
        else 
            return FALSE;
    }

    public function updateStatusDaftarOnline($id)
    {
        $section_ids = array(1, 3);
        if ($this->deactivateNotIn($section_ids))
            return $this->activateSelectedBerita($id);
        else
            return FALSE;
    }

    public function updateStatusDaftarOffline($id)
    {
        $section_ids = array(1, 2);
        if ($this->deactivateNotIn($section_ids))
            return $this->activateSelectedBerita($id);
        else
            return FALSE;
    }

    public function deactivateNotIn($ids)
    {
        $this->db->set('status', 0);
        $this->db->where_not_in('section_id', $ids);
        return $this->db->update('berita');
    }

    public function activateSelectedBerita($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        return $this->db->update('berita');
    }

    public function updateNewDates($input)
    {
        if ($this->isDateRowExist())
            return $this->updateDateSettings($input);
        else
            return $this->insertDateSettings($input);
    }

    public function insertDateSettings($dates)
    {
        return $this->db->insert('setting_tanggal', $dates);
    }

    public function updateDateSettings($dates)
    {
        $this->db->set($dates);
        return $this->db->update('setting_tanggal');
    }

    public function isDateRowExist()
    {
        $dates = $this->fetchDateSettings();
        if (isset($dates))
            return TRUE;
        else
            return FALSE;
    }

    public function updateNewContacts($input)
    {
        if ($this->isContactRowExist())
            return $this->updateContactSettings($input);
        else
            return $this->insertContactSettings($input);
    }
    
    public function updateContactSettings($contact)
    {
        $this->db->set($contact);
        return $this->db->update('setting_kontak');
    }

    public function insertContactSettings($contact)
    {
        return $this->db->insert('setting_kontak', $contact);
    }

    public function isContactRowExist()
    {
        $contacts = $this->fetchContactSettings();
        if (isset($contacts))
            return TRUE;
        else
            return FALSE;
    }

    public function insertDoc($file)
    {
        return $this->db->insert('file_upload', $file);
    }

    public function insertCarousel($file)
    {
        return $this->db->insert('file_asset', $file);
    }

    public function deleteCarouselById($id)
    {
        $table = 'file_asset';
        $isDeleted = $this->deleteFileFromStorage($id, $table);
        if ($isDeleted) {
            $this->db->where('id', $id);
            return $this->db->delete('file_asset');
        }
    }

    public function deleteDocumentById($id)
    {
        $table = 'file_upload';
        $isDeleted = $this->deleteFileFromStorage($id, $table);
        if ($isDeleted) {
            $this->db->where('id', $id);
            return $this->db->delete('file_upload');
        }
    }

    public function deleteFileFromStorage($id, $table)
    {
        $file = $this->fetchPath($id, $table);
        $path = $file['path'] . $file['nama'];
        return unlink($path);
    }

    public function fetchPath($id, $table)
    {
        $this->db->select('path, nama');
        $this->db->from($table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

}
?>