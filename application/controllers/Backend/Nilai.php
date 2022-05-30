<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jurusan_model');
        $this->load->model('pengajar_model');
        $this->load->model('nilai_model');
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

        $id_kelas = $cari['id_kelas'];
        $data['kelas'] = $this->db->where(['id_kelas' => $id_kelas])->get('tb_kelas')->row_array();
        $id_jurusan = $cari['id_jurusan'];
        $data['jurusan'] = $this->db->where(['id_jurusan' => $id_jurusan])->get('tb_jurusan')->row_array();
        $kode_mapel = $cari['kode_mapel'];
        $data['mapel'] = $this->db->where(['kode_mapel' => $kode_mapel])->get('tb_mapel')->row_array();
        $nip = $cari['nip'];
        $data['nip'] = $this->db->where(['nip' => $nip])->get('tb_guru')->row_array();

        $data['start'] = 0;
        $data['is_active'] = 'mtr';
        $data['title'] = "Materi | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Nilai';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();

        $where = [
            'a.id_kelas' => $id_kelas,
            'a.id_jurusan' => $id_jurusan,
            'a.nip' => $nip,    
            'a.kode_mapel' => $kode_mapel
        ];

        $data['data'] = $this->nilai_model->getAll($where);

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/nilai/data_nilai', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function edit($id)
    {
        $data['start'] = 0;
        $data['is_active'] = 'jwl';
        $data['title'] = "Edit Nilai | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Edit Nilai';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->nilai_model->getById($id);

        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => 'Kelas tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/nilai/edit_nilai', $data);
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
}
