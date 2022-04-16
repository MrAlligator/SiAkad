<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jurusan_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'jrs';
        $data['title'] = "Data Jurusan | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Jurusan';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['subjects'] = $this->jurusan_model->getAll();
        $data['count'] = $this->jurusan_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/jurusan/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['start'] = 0;
        $data['is_active'] = 'mpl';
        $data['title'] = "Tambah Data Jurusan | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Tambah Data Jurusan';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
            'required' => 'Jurusan tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/jurusan/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            $data = [
                'jurusan' => $this->input->post('jurusan')
            ];
            $this->jurusan_model->inputData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('data-jurusan');
        }
    }

    public function delete($id_jurusan)
    {
        $where = array('id_jurusan' => $id_jurusan);

        //Execution
        $this->jurusan_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('data-jurusan');
    }
}
