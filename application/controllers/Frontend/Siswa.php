<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/siswa_model');
    }

    public function index()
    {
        $data['dataSiswa']=$this->siswa_model->getAll();
        $data['title']="siswa";
        $this->load->view('frontend/_partials/head',$data);
		$this->load->view('frontend/_partials/header');
		$this->load->view('frontend/_partials/banner',$data);
		$this->load->view('frontend/siswa/index');
		$this->load->view('frontend/_partials/footer');
		$this->load->view('frontend/_partials/js');
    }
}




