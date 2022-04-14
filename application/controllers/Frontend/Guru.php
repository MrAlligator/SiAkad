<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
    }

    public function index()
    {
        $data['dataGuru'] = $this->guru_model->getAll();
        $data['title'] = "guru";
        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/_partials/header');
        $this->load->view('frontend/_partials/banner', $data);
        $this->load->view('frontend/guru/index', $data);
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
