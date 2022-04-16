<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengajar_model');
        $this->load->model('guru_model');
        $this->load->model('kelas_model');
        $this->load->model('jurusan_model');
        $this->load->model('mapel_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'pgj';
        $data['title'] = "Data Pengajar | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Pengajar';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['lecturers'] = $this->pengajar_model->getAll();
        $data['count'] = $this->pengajar_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/pengajar/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['start'] = 0;
        $data['is_active'] = 'pgj';
        $data['title'] = "Tambah Data Pengajar | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Tambah Data Pengajar';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['teachers'] = $this->guru_model->getGuru();
        $data['classes'] = $this->kelas_model->getAll();
        $data['subjects'] = $this->mapel_model->getAll();
        $data['majors'] = $this->jurusan_model->getAll();

        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => 'Kelas tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/pengajar/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            $data = [
                'kode_mapel' => $this->input->post('mapel'),
                'id_kelas' => $this->input->post('kelas'),
                'id_jurusan' => $this->input->post('jurusan'),
                'nip' => $this->input->post('pengajar')
            ];
            $this->pengajar_model->inputData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('data-pengajar');
        }
    }

    public function delete($id_pengajar)
    {
        $where = array('id_pengajar' => $id_pengajar);

        //Execution
        $this->pengajar_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('data-pengajar');
    }
}
