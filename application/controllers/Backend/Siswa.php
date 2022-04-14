<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'ssw';
        $data['title'] = "Siswa | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['students'] = $this->siswa_model->getAll();
        $data['count'] = $this->siswa_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/siswa/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['start'] = 0;
        $data['is_active'] = 'ssw';
        $data['title'] = "Siswa | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Tambah Data Siswa';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['students'] = $this->siswa_model->getAll();
        $data['count'] = $this->siswa_model->count();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/siswa/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
        }
    }
}
