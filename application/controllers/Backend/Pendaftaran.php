<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'pdf';
        $data['title'] = "Data Pendaftaran | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Pendaftaran';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        // $data['employees'] = $this->guru_model->getKaryawan();
        // $data['count'] = $this->guru_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/pendaftaran/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['is_active'] = 'pdf';
        $data['title'] = "Pendaftaran | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Form Pendaftaran';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/pendaftaran/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        }
    }
}
