<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('materi_model');
        $this->load->model('mapel_model');
        $this->load->model('kelas_model');
        $this->load->model('jurusan_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'mtr';
        $data['title'] = "MATERI | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Materi';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $where = [
            'uploaded_by' => $_SESSION['username']
        ];
        if ($_SESSION['level'] == 2) {
            $data['theories'] = $this->materi_model->getAll($where);
        } else {
            $data['theories'] = $this->materi_model->getAllAdmin();
        }

        $data['count'] = $this->materi_model->count();
        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/materi/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['start'] = 0;
        $data['is_active'] = 'mpl';
        $data['title'] = "Tambah Materi | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Tambah Materi';
        $data['mapel'] = $this->mapel_model->getAll();
        $data['kelas'] = $this->kelas_model->getAll();
        $data['jurusan'] = $this->jurusan_model->getAll();
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('judul_materi', 'Judul Materi', 'required|trim', [
            'required' => 'Judul Materi tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|trim', [
            'required' => 'Mata Pelajaran tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => 'Kelas tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
            'required' => 'Jurusan tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/materi/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            $config['upload_path'] = './assets/doc/'; //path folder upload
            $config['allowed_types'] = 'doc|docx|pdf|ppt|pptx'; //tipe yang dapat diupload
            $config['encrypt_name'] = TRUE; //enkripsi nama file ketika diupload
            $config['max_size'] = 1024000000;

            //Execution upload
            $this->upload->initialize($config);
            if (!empty($_FILES['file_materi']['name'])) {
                //cek berhasil
                if ($this->upload->do_upload('file_materi')) {
                    //inisiasi
                    $file = $this->upload->data();
                    $file_name = $file['file_name'];
                    $data = [
                        'judul_materi' => $this->input->post('judul_materi'),
                        'kode_mapel' => $this->input->post('mapel'),
                        'file_name' => $file_name,
                        'id_kelas' => $this->input->post('kelas'),
                        'id_jurusan' => $this->input->post('jurusan'),
                        'uploaded_by' => $_SESSION['username'],
                        'uploaded_at' => strtotime('now')
                    ];
                    $this->materi_model->inputData($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data materi berhasil ditambahkan</div>');
                    redirect('guru/materi');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Dokumen Gagal di upload</div>');
                    redirect('tambah-materi');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Dokumen tidak sesuai</div>');
                redirect('tambah-materi');
            }
        }
    }
}
