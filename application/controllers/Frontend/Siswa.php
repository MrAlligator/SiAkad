<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
        $this->load->model('jadwal_model');
        $this->load->model('nilai_model');
        $this->load->model('materi_model');
    }

    public function index()
    {
        $data['dataSiswa'] = $this->siswa_model->getAll();
        $data['title'] = "siswa";
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/_partials/header');
        $this->load->view('frontend/_partials/banner', $data);
        $this->load->view('frontend/siswa/index');
        $this->load->view('frontend/_partials/footer');
        $this->load->view('frontend/_partials/js');
    }
    public function dashboard()
    {
        $data['title'] = "Dashboard";
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/_partials/headerSiswa');
        $this->load->view('frontend/_partials/homeBanner', $data);
        $this->load->view('frontend/home/siswa');
        $this->load->view('frontend/_partials/footer');
        $this->load->view('frontend/_partials/js');
    }
    public function jadwal()
    {
        $siswa = $this->siswa_model->getByNIS(['nis' => $_SESSION['username']]);
        $where = [
            'a.id_kelas' => $siswa['id_kelas'],
            'a.id_jurusan' => $siswa['id_jurusan'],
        ];
        $data['jadwal'] = $this->jadwal_model->getSiswa($where);
        $data['title'] = "Jadwal";
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/_partials/headerSiswa');
        $this->load->view('frontend/_partials/banner', $data);
        $this->load->view('frontend/siswa/jadwal');
        $this->load->view('frontend/_partials/footer');
        $this->load->view('frontend/_partials/js');
    }
    public function nilai()
    {
        $siswa = $this->siswa_model->getByNIS(['nis' => $_SESSION['username']]);
        $where = [
            'a.nis' => $siswa['nis'],
            'a.id_kelas' => $siswa['id_kelas'],
            'a.id_jurusan' => $siswa['id_jurusan'],
        ];
        $data['data'] = $this->nilai_model->getAll($where);
        $data['title'] = "nilai";
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/_partials/headerSiswa');
        $this->load->view('frontend/_partials/banner', $data);
        $this->load->view('frontend/siswa/nilai');
        $this->load->view('frontend/_partials/footer');
        $this->load->view('frontend/_partials/js');
    }
    public function materi()
    {
        $siswa = $this->siswa_model->getByNIS(['nis' => $_SESSION['username']]);
        $where = [
            'id_kelas' => $siswa['id_kelas'],
            'id_jurusan' => $siswa['id_jurusan'],
        ];
        $data['theories'] = $this->materi_model->getAll($where);
        $data['title'] = "Materi";
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/_partials/headerSiswa');
        $this->load->view('frontend/_partials/banner', $data);
        $this->load->view('frontend/siswa/materi');
        $this->load->view('frontend/_partials/footer');
        $this->load->view('frontend/_partials/js');
    }
    public function profil()
    {
        $where = array('nis' => $_SESSION['username']);
        $data['detailSiswa'] = $this->siswa_model->getByNIS($where);
        $data['title'] = "detail siswa";
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/_partials/headerSiswa');
        $this->load->view('frontend/_partials/banner', $data);
        $this->load->view('frontend/siswa/profil');
        $this->load->view('frontend/_partials/footer');
        $this->load->view('frontend/_partials/js');
    }

    public function detail($id)
    {
        $where = array('nis' => $id);
        $data['detailSiswa'] = $this->siswa_model->getByNIS($where);
        $data['title'] = "detail siswa";
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/_partials/header');
        $this->load->view('frontend/_partials/banner', $data);
        $this->load->view('frontend/siswa/detail');
        $this->load->view('frontend/_partials/footer');
        $this->load->view('frontend/_partials/js');
    }
}
