<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mapel_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'mpl';
        $data['title'] = "Data Mapel | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Mapel';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['subjects'] = $this->mapel_model->getAll();
        $data['count'] = $this->guru_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/mapel/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }
}
