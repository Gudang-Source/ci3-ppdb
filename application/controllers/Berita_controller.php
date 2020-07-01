<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //$this->load->library('upload');
        $this->load->model('Berita_model');
        $this->load->model('Settings_model');
    }

    public function createBerita()
    {
        $format = 'Y-m-d H:i:s';
        $now = $this->Settings_model->getNowTimeJakarta($format);

        $data = array(
            'section_id' => $this->input->post('section'),
            'judul' => $this->input->post('judul'),
            'konten' => $this->input->post('konten'),
            'author' => $_SESSION['nama'],
            'last_update' => $now
        );
        $button = array(
            'publish' => $this->input->post('publish'),
            'draft' => $this->input->post('draft')
        );

        if ($button['publish']) {
            $this->publishContent($data, 'insert');
        } else {
            $this->saveAsDraft($data, 'insert');
        }
    }

    public function updateBerita()
    {
        $format = 'Y-m-d H:i:s';
        $now = $this->Settings_model->getNowTimeJakarta($format);

        $data = array(
            'id' => $this->input->post('idBerita'),
            'judul' => $this->input->post('judul'),
            'konten' => $this->input->post('konten'),
            'section_id' => $this->input->post('section'),
            'author' => $_SESSION['nama'],
            'last_update' => $now
        );
        $button = array(
            'publish' => $this->input->post('publish'),
            'draft' => $this->input->post('draft')
        );

        if ($button['publish']) {
            $this->publishContent($data, 'update');
        } else {
            $this->saveAsDraft($data, 'update');
        }
    }

    public function publishContent($data, $mode)
    {
        if ($mode === 'insert') {
            $this->Berita_model->insertKonten($data);
            $berita = $this->Berita_model->getBeritaIdBy($data['judul']);
            $this->activateContent($berita['id'], $data['section_id']);

            $_SESSION['alert'] = 'Berita berjudul ' . $data['judul'] . ' berhasil di publish';
            redirect('admin/berita/editor');
        } elseif ($mode === 'update') {
            $this->Berita_model->updateKonten($data);
            $this->activateContent($data['id'], $data['section_id']);

            $_SESSION['alert'] = 'Berita berjudul ' . $data['judul'] . ' telah di perbaharui dan di publish';
            redirect('admin/berita/editor');
        } else {
            $_SESSION['alert'] = 'Berita berjudul ' . $data['judul'] . ' gagal di publish. Pastikan semua field telah diisi.';
            redirect('admin/berita/editor');
        }
    }

    public function activateContent($berita_id, $section_id)
    {
        if ($section_id == 1) {
            $this->Settings_model->updateStatusSyarat($berita_id);
        } elseif ($section_id == 2) {
            $this->Settings_model->updateStatusDaftarOnline($berita_id);
        } elseif ($section_id == 3) {
            $this->Settings_model->updateStatusDaftarOffline($berita_id);
        }
    }

    public function saveAsDraft($data, $mode)
    {
        if ($mode == 'insert') {
            $this->Berita_model->insertKonten($data);
        } else {
            $this->Berita_model->updateKonten($data);
        }

        $_SESSION['alert'] = 'Berita berjudul ' . $data['judul'] . ' berhasil di simpas sebagai draft';
        redirect('admin/berita/list');
    }

    public function updateBeritaById()
    {
        $id_berita = $this->uri->segment(4);
        $data_berita = $this->Berita_model->getKontenById($id_berita);
        $data_berita['action'] = '/admin/berita/update';
        return view('berita_editor', ['post' => $data_berita], 'admin');
    }

    public function deleteBeritaById()
    {
        $id_berita = $this->input->post('beritaid');
        $this->Berita_model->deleteKonten($id_berita);
        $_SESSION['alert'] = 'Berita telah dihapus';
        redirect('admin/berita/list');
    }

    public function uploadImagesContent()
    {
        $config['upload_path'] = './uploads/gambar/konten';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('file')) {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        } else {
            $file = $this->upload->data();
            $location = base_url() . 'uploads/gambar/konten/' . $file['file_name'];
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(['location' => $location]))
                ->_display();
            exit;
        }
    }
}
