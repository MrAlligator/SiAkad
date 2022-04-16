<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jurusan_model');
        $this->load->model('pengajar_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'mtr';
        $data['title'] = "Materi | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Materi';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->jurusan_model->getAll();
        $data['kelas'] = $this->db->get('tb_kelas')->result_array();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/nilai/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }
    public function cari()
    {
        $where = [
            'id_kelas' => $this->input->post('kelas'),
            'id_jurusan' => $this->input->post('jurusan'),
            'nip' => $this->session->userdata('username')
        ];
        $cari = $this->pengajar_model->cari($where);
        if (!isset($cari['id_pengajar'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak mengajar kelas tersebut</div>');
            redirect(base_url('nilai'));
        } else {
            redirect(base_url('guru/data-nilai/' . $cari['id_pengajar']));
        }
    }
    public function data_nilai($id)
    {
        $where = [
            'id_pengajar' => $id
        ];
        $cari = $this->pengajar_model->cari($where);
        $data['start'] = 0;
        $data['is_active'] = 'mtr';
        $data['title'] = "Materi | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Nilai';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/nilai/data_nilai', $data);
        $this->load->view('backend/_partials/foot', $data);
    }
}
