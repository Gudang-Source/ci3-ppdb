<?php
class Formulir_model extends CI_Model
{

    protected $generated_id;
    protected $sekolah_id;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Settings_model');
    }

    public function insertAllData()
    {
        $this->prepareDataSekolah();
        $data = array(
            'formulir' => $this->createDataFormulir(),
            'siswa' => $this->catchDataSiswa(),
            'orang_tua' => $this->catchDataOrangTua(),
            'wali' => $this->catchDataWali()
        );

        $this->insertFormulir($data['formulir'], 'formulir');
        $this->insertFormulir($data['siswa'], 'siswa');
        $this->insertFormulir($data['orang_tua'], 'orang_tua');
        $this->insertFormulir($data['wali'], 'wali');

        return $this->getFormId();
    }

    public function prepareDataSekolah()
    {
        $data_sekolah = $this->catchDataSekolah();
        $data_sekolah['nama'] = mb_strtoupper($data_sekolah['nama']);
        if(!empty($data_sekolah['nama'])) {
            $val = TRUE;
            while ($val) {
                $exist = $this->fetchSekolahIdByNama($data_sekolah['nama']);
                if ($exist) {
                    $this->setSekolahId($exist['id']);
                    $val = FALSE;
                }
                else {
                    $this->insertFormulir($data_sekolah, 'asal_sekolah');
                }
            }
        } else {
            $this->setSekolahId(1);
        }
    }

    public function catchDataSekolah()
    {
        $data_sekolah = array(
            'nama' => $this->input->post('nama_sekolah'),
            'status' => $this->input->post('status_sekolah'),
            'alamat' => $this->input->post('alamat_sekolah')
        );
        return $data_sekolah;
    }

    public function fetchSekolahIdByNama($nama)
    {
        $this->db->select('id');
        $this->db->from('asal_sekolah');
        $this->db->where('nama', $nama);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function createDataFormulir()
    {
        $this->genFormId();
        $format = 'Y-m-d H:i:s';
        $now = $this->Settings_model->getNowTimeJakarta($format);
        $data_formulir = array(
            'id' => $this->getFormId(),
            'status' => 'Belum Konfirmasi',
            'kk_miskin' => $this->input->post('kk_miskin'),
            'last_update' => $now
        );
        return $data_formulir;
    }

    public function genFormId()
    {
        $prefix = $this->genRandomPrefix();
        $counter = $this->genRandomCounter();
        // ID : S2023-00001
        $id = $prefix . $counter;
        $this->setFormId($id);
    }

    public function genRandomPrefix()
    {
        $chars = 'ABCDEFGHIJKLMNOOPQRSTUVWXYZ';
        $chars_length = strlen($chars);
        $random_chars = '';
        $format = 'yd';
        for ($i = 0; $i < 2; $i++) {
            $random_chars = $random_chars . $chars[rand(0, $chars_length - 1)];
        }
        $date = $this->Settings_model->getNowTimeJakarta($format);
        return $prefix = $random_chars . $date . '-';
    }

    public function genRandomCounter()
    {
        $random_number = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        return $random_number;
    }

    public function catchDataSiswa()
    {
        $fullname = $this->input->post('fnama1') . ' ' . $this->input->post('lnama1');
        $data_siswa = array(
            'formulir_id' => $this->getFormId(),
            'asal_sekolah_id' => $this->getSekolahId(),
            'nama_lengkap' => $fullname,
            'tempat_lahir' => $this->input->post('tempat'),
            'tanggal_lahir' => $this->input->post('tgl_lahir'),
            'gender' => $this->input->post('gender'),
            'agama' => $this->input->post('agama1'),
            'alamat' => $this->input->post('alamat1'),
            'dari_kelas' => $this->input->post('dari_kelas')
        );
        return $data_siswa;
    }

    public function catchDataOrangTua()
    {
        $fullname = $this->input->post('fnama2') . ' ' . $this->input->post('lnama2');
        $data_orangtua = array(
            'formulir_id' => $this->getFormId(),
            'nama_lengkap' => $fullname,
            'pekerjaan' => $this->input->post('pekerjaan1'),
            'agama' => $this->input->post('agama2'),
            'alamat' => $this->input->post('alamat2'),
            'telepon' => $this->input->post('telepon1')
        );
        return $data_orangtua;
    }

    public function catchDataWali()
    {
        $fullname = $this->input->post('fnama3') . ' ' . $this->input->post('lnama3');
        $data_wali = array(
            'formulir_id' => $this->getFormId(),
            'nama_lengkap' => $fullname,
            'pekerjaan' => $this->input->post('pekerjaan2'),
            'agama' => $this->input->post('agama3'),
            'alamat' => $this->input->post('alamat3'),
            'telepon' => $this->input->post('telepon2')
        );
        return $data_wali;
    }

    protected function setSekolahId($id)
    {
        $this->sekolah_id = $id;
    }

    protected function getFormId()
    {
        return $this->generated_id;
    }

    protected function getSekolahId()
    {
        return $this->sekolah_id;
    }

    protected function setFormId($id)
    {
        $this->generated_id = $id;
    }

    public function insertFormulir($data, $table)
    {
        return $this->db->insert($table, $data);       
    }

    public function updateStatusFormulir($id, $status)
    {
        $format = 'Y-m-d H:i:s';
        $now = $this->Settings_model->getNowTimeJakarta($format);
        $this->db->set('status', $status);
        $this->db->set('last_update', $now);
        $this->db->where('id', $id);
        return $this->db->update('formulir');
    }

    public function fetchFormulirById($form_id)
    {
        $this->db->select('*');
        $this->db->where('id', $form_id);
        $this->db->from('formulir');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function fetchAllFormulir()
    {
        $this->db->select('*');
        $this->db->from('formulir as f');
        $this->db->join('siswa as s', 'f.id = s.formulir_id');
        $this->db->where('status', 'Belum Konfirmasi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchFormulirDetail($id)
    {
        $this->db->select('f.id, f.status, f.create_date, f.last_update, 
            s.nama_lengkap AS fullname1, s.tempat_lahir, s.tanggal_lahir, s.gender,
            s.agama AS agama1, s.alamat AS alamat1, ot.nama_lengkap AS fullname2, 
            ot.pekerjaan AS pekerjaan1, ot.agama AS agama2, ot.alamat AS alamat2, ot.telepon AS telepon1, 
            w.nama_lengkap AS fullname3, w.pekerjaan AS pekerjaan2, w.agama AS agama3, 
            w.alamat AS alamat3, w.telepon AS telepon2, tk.nama AS nama_sekolah, 
            tk.status AS status_sekolah, tk.alamat AS alamat_sekolah');
        $this->db->from('formulir as f');
        $this->db->join('siswa as s', 'f.id = s.formulir_id');
        $this->db->join('asal_sekolah as tk', 's.asal_sekolah_id = tk.id');
        $this->db->join('orang_tua as ot', 'f.id = ot.formulir_id');
        $this->db->join('wali as w', 'f.id = w.formulir_id');
        $this->db->where('f.id', $id);
        $query = $this->db->get();
        return $query->row_array();

    }
}

?>