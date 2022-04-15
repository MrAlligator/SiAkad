<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('media_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'gal';
        $data['title'] = "Galeri | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = "Data Galeri";
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['medias'] = $this->media_model->getAll();
        $data['count'] = $this->media_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/media/index');
        $this->load->view('backend/_partials/foot', $data);
    }
}
