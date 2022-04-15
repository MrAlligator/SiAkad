<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('materi_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'mtr';
        $data['title'] = "Materi | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Materi';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['theories'] = $this->materi_model->getAll();
        $data['count'] = $this->materi_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/materi/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }
}
