<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('konten_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'pgn';
        $data['title'] = "Pengumuman | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Pengumuman';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['announcements'] = $this->konten_model->getPengumuman();
        $data['count'] = $this->konten_model->countP();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/pengumuman/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['start'] = 0;
        $data['is_active'] = 'pgn';
        $data['title'] = "Tambah Pengumuman | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Tambah Pengumuman';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required' => 'Judul tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/pengumuman/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            //Config upload
            $config['upload_path'] = './assets/img/pengumuman/'; //path folder upload
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
                    $config['source_image'] = './assets/img/pengumuman/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 1366; //menentukan lebar
                    $config['height'] = 720; //menentukan tinggi
                    $config['new_image'] = './assets/img/pengumuman/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    $judul = $this->input->post('judul'); //input judul
                    //buat slug url
                    $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul); //filter karakter unik dan replace dengan kosong ('')
                    $trim = trim($string); //menghilangkan spasi berlebih
                    $pre_slug = strtolower(str_replace(" ", "-", $trim)); //menghilangkan spasi kemudian mengganti dengan (-)
                    $slug = $pre_slug . '.html'; //slug yang akan disimpan ke database
                    //data yang akan diinput ke database
                    $data = [
                        'jenis_konten' => 2,
                        'judul_konten' => $judul,
                        'slug_konten' => $slug,
                        'excerpt_konten' => $this->input->post('excerpt'),
                        'body_konten' => $this->input->post('body'),
                        'image_konten' => $image,
                        'uploaded_at' => strtotime('now')
                    ];
                    $this->konten_model->inputData($data); //simpan data ke database
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman berhasil ditambahkan</div>');
                    redirect('data-pengumuman');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar atau Video Gagal di upload</div>');
                    redirect('tambah-pengumuman');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Perhatikan gambar atau video yang diupload</div>');
                redirect('tambah-pengumuman');
            }
        }
    }

    public function read($slug_konten)
    {
        $where = array('slug_konten' => $slug_konten);
        $announcement = $this->konten_model->viewBySlug($where);
        $data['is_active'] = 'pgn';
        $data['title'] = $announcement['judul_konten'] . " | SIAKAD SMK DARUSSALAM";
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['announcementdata'] = $announcement;

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/pengumuman/view', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function update($slug_konten)
    {
        $where = array('slug_konten' => $slug_konten);
        $data['is_active'] = 'pgn';
        $data['title'] = "Edit Pengumuman | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Edit Pengumuman';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['announcementdata'] = $this->konten_model->getBySlug($where);

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required' => 'Judul tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/pengumuman/edit', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            //Config upload
            $config['upload_path'] = './assets/img/pengumuman/'; //path folder upload
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
                    $config['source_image'] = './assets/img/pengumuman/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 1366; //menentukan lebar
                    $config['height'] = 720; //menentukan tinggi
                    $config['new_image'] = './assets/img/pengumuman/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    $judul = $this->input->post('judul'); //input judul
                    //buat slug url
                    $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul); //filter karakter unik dan replace dengan kosong ('')
                    $trim = trim($string); //menghilangkan spasi berlebih
                    $pre_slug = strtolower(str_replace(" ", "-", $trim)); //menghilangkan spasi kemudian mengganti dengan (-)
                    $slug = $pre_slug . '.html'; //slug yang akan disimpan ke database
                    //data yang akan diinput ke database
                    $data = [
                        'judul_konten' => $judul,
                        'slug_konten' => $slug,
                        'excerpt_konten' => $this->input->post('excerpt'),
                        'body_konten' => $this->input->post('body'),
                        'image_konten' => $image,
                    ];
                    $this->konten_model->updateData($where, $data); //simpan data ke database
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman berhasil diubah</div>');
                    redirect('data-pengumuman');
                } else {
                    $judul = $this->input->post('judul'); //input judul
                    //buat slug url
                    $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul); //filter karakter unik dan replace dengan kosong ('')
                    $trim = trim($string); //menghilangkan spasi berlebih
                    $pre_slug = strtolower(str_replace(" ", "-", $trim)); //menghilangkan spasi kemudian mengganti dengan (-)
                    $slug = $pre_slug . '.html'; //slug yang akan disimpan ke database
                    //data yang akan diinput ke database
                    $data = [
                        'judul_konten' => $judul,
                        'slug_konten' => $slug,
                        'excerpt_konten' => $this->input->post('excerpt'),
                        'body_konten' => $this->input->post('body'),
                    ];
                    $this->konten_model->updateData($where, $data); //simpan data ke database
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman berhasil diubah</div>');
                    redirect('data-pengumuman');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Perhatikan gambar atau video yang diupload</div>');
                redirect('ubah-pengumuman');
            }
        }
    }

    public function delete($id_konten)
    {
        //Load
        $where = array('id_konten' => $id_konten); //Mengambil data sesuai id yang dipilih

        //Execution
        $this->konten_model->deleteData($where); //Menghapus data sesuai dengan id yang dipilih
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berita berhasil dihapus</div>');
        redirect('data-pengumuman');
    }
}
