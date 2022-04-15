<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
        $this->load->model('guru_model');
    }

    public function index()
    {
        $data['is_active'] = 'dsh';
        $data['title'] = "Dashboard | SIAKAD SMK DARUSSALAM";
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['countS'] = $this->siswa_model->count();
        $data['countG'] = $this->guru_model->countG();
        $data['countK'] = $this->guru_model->countK();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/home/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }
}
