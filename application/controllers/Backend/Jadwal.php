<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jurusan_model');
        $this->load->model('pengajar_model');
        $this->load->model('nilai_model');
        $this->load->model('mapel_model');
        $this->load->model('kelas_model');
        $this->load->model('jurusan_model');
        $this->load->model('guru_model');
        $this->load->model('jadwal_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'mtr';
        $data['title'] = "Materi | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Jadwal KBM';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->jurusan_model->getAll();
        $data['kelas'] = $this->db->get('tb_kelas')->result_array();
        $where = [
            'a.nip' => $_SESSION['username']
        ];
        $data['jadwal'] = $this->jadwal_model->getWhere($where);

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/jadwal/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function index_admin()
    {
        $data['start'] = 0;
        $data['is_active'] = 'jwl';
        $data['title'] = "Jadwal Pembelajaran | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Jadwal Pembelajaran';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['schedules'] = $this->jadwal_model->getAll();
        $data['count'] = $this->jadwal_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/jadwal/index_admin', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['start'] = 0;
        $data['is_active'] = 'jwl';
        $data['title'] = "Tambah Jadwal Pembelajaran | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Tambah Jadwal Pembelajaran';
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
            $this->load->view('backend/data/jadwal/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            $data = [
                'kode_mapel' => $this->input->post('mapel'),
                'id_kelas' => $this->input->post('kelas'),
                'id_jurusan' => $this->input->post('jurusan'),
                'nip' => $this->input->post('pengajar'),
                'jam' => $this->input->post('jam'),
                'hari' => $this->input->post('hari')
            ];
            $this->jadwal_model->inputData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('administrator/data-jadwal-pembelajaran');
        }
    }


    public function delete($id_jadwal)
    {
        $where = array('id_jadwal' => $id_jadwal);

        //Execution
        $this->jadwal_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('administrator/data-jadwal-pembelajaran');
    }
}
