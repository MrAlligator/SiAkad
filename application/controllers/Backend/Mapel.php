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
        $data['count'] = $this->mapel_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/mapel/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['start'] = 0;
        $data['is_active'] = 'mpl';
        $data['title'] = "Tambah Data Mapel | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Tambah Data Mapel';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['count'] = $this->mapel_model->count();

        $this->form_validation->set_rules('kode', 'Kode Mapel', 'required|trim', [
            'required' => 'Kode Mapel tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|trim', [
            'required' => 'Mata Pelajaran tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/mapel/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            $data = [
                'kode_mapel' => $this->input->post('kode'),
                'nama_mapel' => $this->input->post('mapel')
            ];
            $this->mapel_model->inputData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('data-mapel');
        }
    }

    public function delete($id_mapel)
    {
        $where = array('id_mapel' => $id_mapel);

        //Execution
        $this->mapel_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('data-mapel');
    }
}
