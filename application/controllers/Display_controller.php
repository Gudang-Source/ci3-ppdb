<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display_controller extends CI_Controller 
{	
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Auth_model');
        $this->load->model('Berita_model');
        $this->load->model('Formulir_model');
        $this->load->model('Penerimaan_model');
        $this->load->model('Display_model');
        $this->load->model('Users_model');
    }

    public function index()
	{
		$this->home();
    }
    
    public function home()
    {   
        $home = array(
            'syarat_pendaftaran' => $this->Berita_model->fetchActiveContent(1),
            'pendaftaran_online' => $this->Berita_model->fetchActiveContent(2),
            'pendaftaran_offline' => $this->Berita_model->fetchActiveContent(3),
            'carousel' => $this->Display_model->fetchAllCarousel(),
            'tanggal' => $this->Display_model->getAndFormatTanggal(),
            'kontak' => $this->Display_model->fetchAllContacts()
        );
        return view('home', $home, 'public');
    }
	
	public function pendaftaran()
	{
        $pendaftaran = $this->Display_model->fetchAllContacts();
		return view('pendaftaran', ['kontak' => $pendaftaran], 'public');
	}

	public function penerimaan()
	{
        $penerimaan = $this->Display_model->fetchAllContacts();
		return view('penerimaan', ['kontak' => $penerimaan], 'public');
	}

	public function download()
	{
        $data = array(
            'files' => $this->Display_model->fetchAllDocs(),
            'kontak' => $this->Display_model->fetchAllContacts()
        );
		return view('download', $data, 'public');
    }
    
    public function login()
    {
        if ($this->Auth_model->isLoggedIn())
            redirect('admin/dashboard');
        else
            return redirectTo('login', 'admin');
    }

    public function displayDashboard()
    {
        if ($this->Auth_model->isLoggedIn()) {
            $data = array(
                'total_formulir' => $this->Display_model->countAllFormulir(),
                'total_dikonfirmasi' => $this->Display_model->countDataFormulir('Telah Dikonfirmasi'),
                'total_diterima' => $this->Display_model->countDataFormulir('Diterima'),
                'total_ditolak' => $this->Display_model->countDataFormulir('Ditolak'),
                'recent_formulir' => $this->Display_model->fetchRecentFormulir()
            );
            return view('dashboard', $data, 'admin');
        }
        else
            redirect('login');
    }

    public function displayEditor()
    {
        if ($this->Auth_model->isLoggedIn()) {
            $post_data = array(
                'id' => '',
                'judul' => '',
                'konten' => '',
                'action' => 'admin/berita/create'       
            );
            return view('berita_editor', ['post' => $post_data], 'admin');
        } 
        else
            redirect('login');
    }

    public function displayAllBerita()
    {
        if ($this->Auth_model->isLoggedIn()) {
            $data = $this->Berita_model->getAllKonten();
            $data = $this->Display_model->shiftStatus($data);
            return view('berita_list', ['list' => $data], 'admin');
        } else {
            redirect('login');
        }
    }

    public function displayAllFormulir()
    {
        if ($this->Auth_model->isLoggedIn()) {
            $berkas = $this->Formulir_model->fetchAllFormulir();
            return view('formulir', ['berkas' => $berkas], 'admin');
        } else {
            redirect('login');
        }
    }

    public function displayDetailFormulir()
    {
        if ($this->Auth_model->isLoggedIn()) {
            $formulir_id = $this->uri->segment(4, 0);
            $detail = $this->Formulir_model->fetchFormulirDetail($formulir_id);
            return view('formulir_detail', ['detail' => $detail], 'admin');
        } else {
            redirect('login');
        }
    }

    public function displayCreateFormulir()
    {
        if ($this->Auth_model->isLoggedIn())
            return redirectTo('formulir_create', 'admin');
        else
            redirect('login');
    }

    public function displayAllConfirmed()
    {
        if ($this->Auth_model->isLoggedIn()) {
            $calon_pd = $this->Penerimaan_model->fetchAllConfirmed();
            return view('penerimaan_konfirmasi', ['pd' => $calon_pd] ,'admin');
        } else {
            redirect('login');
        }
    }

    public function displayArsipPenerimaan()
    {
        if ($this->Auth_model->isLoggedIn()) {
            $data_arsip = array(
                'diterima' => $this->Penerimaan_model->fetchArsipPenerimaanDiterima(),
                'ditolak' => $this->Penerimaan_model->fetchArsipPenerimaanDitolak()
            );
            return view('penerimaan_arsip', $data_arsip, 'admin');
        } else {
            redirect('login');
        }
    }

    public function displayHasilPenerimaan()
    {
        $form_id = $this->input->post('formid');
        $data = array(
            'data' => $this->Penerimaan_model->fetchHasilPenerimaan($form_id),
            'kontak' => $this->Display_model->fetchAllContacts()
        );
        return view('penerimaan_hasil', $data, 'public');
    }

    public function displaySettings()
    {
        if ($this->Auth_model->isLoggedIn()) {
            $settings = array(
                'syarat' => $this->Settings_model->fetchAllContentBySection(1),
                'daftarol' => $this->Settings_model->fetchAllContentBySection(2),
                'daftaroff' => $this->Settings_model->fetchAllContentBySection(3),
                'pendaftaran' => $this->Settings_model->getStatusPendaftaran(),
                'tanggal' => $this->Settings_model->fetchDateSettings(),
                'kontak' => $this->Settings_model->fetchContactSettings(),
                'docs' => $this->Settings_model->fetchAllFileDocs(),
                'carousel' => $this->Settings_model->fetchAllCarousel()
            );
            return view('settings', $settings, 'admin');
        } else {
            redirect('login');
        }
    }

    public function displayResetPassword()
    {
        if ($this->Auth_model->isLoggedIn())
            return redirectTo('reset_password', 'admin');
        else
            redirect('login');
    }

    public function displayUser()
    {
        $data = $this->Users_model->fetchAllUsers();
        return view('users', ['data' => $data], 'admin');
    }

    public function displayCreateUser()
    {
        return redirectTo('users_add', 'admin');
    }
}