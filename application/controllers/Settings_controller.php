<?php
defined('BASEPATH') OR exit('No direct scripts allowed');

class Settings_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Settings_model');
        $this->load->library('upload');
    }

    public function updateActiveContent()
    {
        $syarat_id = $this->input->post('syarat');
        $online_id = $this->input->post('online');
        $offline_id = $this->input->post('offline');

        $this->Settings_model->updateStatusSyarat($syarat_id);
        $this->Settings_model->updateStatusDaftarOnline($online_id);
        $this->Settings_model->updateStatusDaftarOffline($offline_id);
        
        $_SESSION['alert'] = 'Pengaturan aktif konten telah di perbaharui';
        redirect('admin/settings/panel');
    }

    public function updateDates()
    {
        $dates = array(
            'daftar_mulai' => $this->input->post('tgl_daftar_m'),
            'daftar_akhir' => $this->input->post('tgl_daftar_a'),
            'penjajagan' => $this->input->post('tgl_penjajagan'),
            'heregistrasi_mulai' => $this->input->post('tgl_heregistrasi_m'),
            'heregistrasi_akhir' => $this->input->post('tgl_heregistrasi_a'),
            'belajar_perdana' => $this->input->post('tgl_belajar')
        );
        $check = $this->Settings_model->updateNewDates($dates);
        if ($check) {
            $_SESSION['alert'] = 'Pengaturan tanggal penting telah di perbaharui';
            redirect('admin/settings/panel');
        }
        else {
            $_SESSION['alert_fail'] = 'Terjadi kesalahan, silahkan kontak administrator.';
            redirect('admin/settings/panel');
        }
    }

    public function updateContacts()
    {
        $contacts = array(
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'facebook' => $this->input->post('facebook'),
            'alamat' => $this->input->post('alamat')
        );
        $check = $this->Settings_model->updateNewContacts($contacts);
        if ($check) {
            $_SESSION['alert'] = 'Pengaturan kontak telah di perbaharui';
            redirect('admin/settings/panel');
        }
        else {
            $_SESSION['alert_fail'] = 'Terjadi kesalahan, silahkan kontak administrator.';
            redirect('admin/settings/panel');
        }
    }

    public function uploadFilesImage()
    {
        $path = './uploads/gambar/pengaturan';
        $types = 'jpg|jpeg|png';
        $config = $this->Settings_model->configUpload($path, $types);
        $this->upload->initialize($config);

        $this->upload->do_upload('carousel');

        $detail_file = array(
            'nama' => $this->upload->data('file_name'),
            'caption' => $this->input->post('caption'),
            'size' => $this->upload->data('file_size'),
            'path' => $this->upload->data('file_path')
        );

        if ($detail_file['size'] < $config['max_size']) {
            $this->Settings_model->insertCarousel($detail_file);
            $_SESSION['alert'] = 'File ' . $detail_file['nama'] . ' telah diunggah.';
            redirect('admin/settings/panel');
        }
        else {
            $_SESSION['alert_fail'] = 'File ' . $detail_file['nama'] . ' melebihi ukuran maksimal atau bukan format gambar.';
            redirect('admin/settings/panel');
        }
    }

    public function uploadFilesDoc()
    {
        $path = './uploads/docs';
        $types = 'doc|docx|odt|pdf';
        $config = $this->Settings_model->configUpload($path, $types);
        $this->upload->initialize($config);

        $this->upload->do_upload('dokumen');

        $detail_file = array(
            'nama' => $this->upload->data('file_name'),
            'tipe' => $this->upload->data('file_type'),
            'size' => $this->upload->data('file_size'),
            'path' => $this->upload->data('file_path')
        );

        if ($detail_file['size'] < $config['max_size']) {
            $this->Settings_model->insertDoc($detail_file);
            $_SESSION['alert'] = 'File ' . $detail_file['nama'] . ' telah di unggah';
            redirect('admin/settings/panel');
        }
        else {
            $_SESSION['alert_fail'] = 'File ' . $detail_file['nama'] . ' melebihi ukuran maksimal atau bukan format dokumen.';
            redirect('admin/settings/panel');
        }
    }

    public function deleteFile()
    {
        $file = array(
            'doc' => $this->input->post('docid'),
            'car' => $this->input->post('carouselid')
        );
        $isAsset = $this->isFileAsset($file);

        if ($isAsset)
            $this->Settings_model->deleteCarouselById($file['car']);
        else
            $this->Settings_model->deleteDocumentById($file['doc']);

        $_SESSION['alert'] = 'File telah dihapus';
        redirect ('admin/settings/panel');
    }

    public function isFileAsset($file)
    {
        if ($file['car'] !== "")
            return TRUE;
        else
            return FALSE;
    }
}
?>