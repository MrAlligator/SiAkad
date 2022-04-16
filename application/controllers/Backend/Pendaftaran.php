<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pendaftaran_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'pdf';
        $data['title'] = "Data Pendaftaran | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Pendaftaran';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['registrants'] = $this->pendaftaran_model->getAll();
        $data['count'] = $this->pendaftaran_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/pendaftaran/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['is_active'] = 'pdf';
        $data['title'] = "Pendaftaran | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Form Pendaftaran';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('no_daftar', 'No Pendaftaran', 'required|trim', [
            'required' => 'Nama Depan tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('asal', 'Asal SMP', 'required|trim', [
            'required' => 'Asal SMP tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('tmptlhr', 'Tempat Lahir', 'required|trim', [
            'required' => 'Tempat Lahir tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('tgllhr', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Tanggal Lahir tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('telp', 'Telepon', 'required|trim', [
            'required' => 'Telepon tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/pendaftaran/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            //Config upload
            $config['upload_path'] = './assets/img/pendaftar/'; //path folder upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //tipe yang dapat diupload
            $config['encrypt_name'] = TRUE; //enkripsi nama file ketika diupload

            //Execution upload
            $this->upload->initialize($config);

            //cek inputan
            if (!empty($_FILES['image']['name'])) {
                //cek berhasil
                if ($this->upload->do_upload('image')) {
                    //inisiasi
                    $gbr = $this->upload->data();
                    //config kompresi file
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/pendaftar/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 710; //menentukan lebar
                    $config['height'] = 420; //menentukan tinggi
                    $config['new_image'] = './assets/img/pendaftar/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    $data = [
                        'no_pendaftaran' => htmlspecialchars($this->input->post('no_daftar')),
                        'asal_smp' => htmlspecialchars($this->input->post('asal')),
                        'nama_pendaftar' => htmlspecialchars($this->input->post('nama')),
                        'tmptlhr_pendaftar' => $this->input->post('tmptlhr'),
                        'tgllhr_pendaftar' => strtotime($this->input->post('tgllhr')),
                        'jk_pendaftar' => $this->input->post('jk'),
                        'agama_pendaftar' => $this->input->post('agama'),
                        'alamat_pendaftar' => $this->input->post('alamat'),
                        'telp_pendaftar' => $this->input->post('telp'),
                        'image_pendaftar' => $image,
                        'verified_berkas_pendaftar' => 0
                    ];
                    $this->pendaftaran_model->inputData($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pendaftar berhasil ditambahkan</div>');
                    redirect('karyawan/pendaftaran');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Gagal di upload</div>');
                    redirect('karyawan/input-calon-siswa-baru');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Perhatikan gambar yang diupload</div>');
                redirect('karyawan/input-calon-siswa-baru');
            }
        }
    }

    public function delete($id_pendaftaran)
    {
        $where = array('id_pendaftaran' => $id_pendaftaran);

        //Execution
        $this->pendaftaran_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('karyawan/pendaftaran');
    }

    public function verify()
    {
        $data['start'] = 0;
        $data['is_active'] = 'ver';
        $data['title'] = "Verifikasi Berkas | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Verifikasi Berkas';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['verifies'] = $this->pendaftaran_model->getUnverified();
        $data['count'] = $this->pendaftaran_model->countUV();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/pendaftaran/verify', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function confirmVerify($id_pendaftaran)
    {
        $where = array('id_pendaftaran' => $id_pendaftaran);
        $data = [
            'verified_berkas_pendaftar' => 1
        ];
        $this->pendaftaran_model->updateData($where, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diverifikasi</div>');
        redirect('karyawan/verifikasi');
    }

    public function calon()
    {
        $data['start'] = 0;
        $data['is_active'] = 'sbr';
        $data['title'] = "Calon Siswa Baru | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Calon Siswa Baru';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['verifies'] = $this->pendaftaran_model->getVerified();
        $data['count'] = $this->pendaftaran_model->countV();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/pendaftaran/verified', $data);
        $this->load->view('backend/_partials/foot', $data);
    }
}
