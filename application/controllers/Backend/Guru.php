<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
        $this->load->model('users_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'gru';
        $data['title'] = "Data Guru | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Guru';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['teachers'] = $this->guru_model->getGuru();
        $data['count'] = $this->guru_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/guru/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['start'] = 0;
        $data['is_active'] = 'gru';
        $data['title'] = "Tambah Data Guru | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Tambah Data Guru';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $last_id = $this->guru_model->get_latest_id_user();

        $this->form_validation->set_rules('fname', 'Nama Depan', 'required|trim', [
            'required' => 'Nama Depan tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('lname', 'Nama Belakang', 'required|trim', [
            'required' => 'Nama Belakang tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
            'required' => 'NIP tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('tempatlhr', 'Tempat Lahir', 'required|trim', [
            'required' => 'Tempat Lahir tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('tanggallhr', 'Tanggal Lahir', 'required|trim', [
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
            $this->load->view('backend/data/guru/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            //Config upload
            $config['upload_path'] = './assets/img/guru/'; //path folder upload
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
                    $config['source_image'] = './assets/img/guru/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 710; //menentukan lebar
                    $config['height'] = 420; //menentukan tinggi
                    $config['new_image'] = './assets/img/guru/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    $dataGuru = [
                        'nip' => htmlspecialchars($this->input->post('nip')),
                        'nama_guru' => htmlspecialchars($this->input->post('fname') . ' ' . $this->input->post('lname')),
                        'jk_guru' => htmlspecialchars($this->input->post('jk')),
                        'agama_guru' => htmlspecialchars($this->input->post('agama')),
                        'tmptlahir' => htmlspecialchars($this->input->post('tempatlhr')),
                        'tgllahir' => strtotime($this->input->post('tanggallhr')),
                        'alamat_guru' => htmlspecialchars($this->input->post('alamat')),
                        'telp_guru' => htmlspecialchars($this->input->post('telp')),
                        'status' => 2,
                        'image_guru' => $image
                    ];
                    $dataLogin = [
                        'id_konek' => $last_id + 1,
                        'username_user' => $this->input->post('nip'),
                        'password_user' => password_hash($this->input->post('nip'), PASSWORD_DEFAULT),
                        'viewpassword_user' => $this->input->post('nip'),
                        'status_user' => 2
                    ];
                    $this->guru_model->inputData($dataGuru);
                    $this->users_model->inputData($dataLogin);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Guru berhasil ditambahkan</div>');
                    redirect('data-guru');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Gagal di upload</div>');
                    redirect('tambah-guru');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Perhatikan gambar yang diupload</div>');
                redirect('tambah-guru');
            }
        }
    }

    public function update($id_guru)
    {
        $where = array('id_guru' => $id_guru);
        $data['start'] = 0;
        $data['is_active'] = 'gru';
        $data['title'] = "Edit Data Guru | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Edit Data Guru';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['teacherdata'] = $this->guru_model->getById($where);
        $data['count'] = $this->guru_model->count();

        $this->form_validation->set_rules('fname', 'Nama Depan', 'required|trim', [
            'required' => 'Nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
            'required' => 'NIP tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('tempatlhr', 'Tempat Lahir', 'required|trim', [
            'required' => 'Tempat Lahir tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('tanggallhr', 'Tanggal Lahir', 'required|trim', [
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
            $this->load->view('backend/data/guru/edit', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            //Config upload
            $config['upload_path'] = './assets/img/guru/'; //path folder upload
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
                    $config['source_image'] = './assets/img/guru/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 710; //menentukan lebar
                    $config['height'] = 420; //menentukan tinggi
                    $config['new_image'] = './assets/img/guru/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    $dataGuru = [
                        'nip' => htmlspecialchars($this->input->post('nip')),
                        'nama_guru' => htmlspecialchars($this->input->post('fname')),
                        'jk_guru' => htmlspecialchars($this->input->post('jk')),
                        'agama_guru' => htmlspecialchars($this->input->post('agama')),
                        'tmptlahir' => htmlspecialchars($this->input->post('tempatlhr')),
                        'tglllahir' => strtotime($this->input->post('tanggallhr')),
                        'alamat_guru' => htmlspecialchars($this->input->post('alamat')),
                        'telp_guru' => htmlspecialchars($this->input->post('telp')),
                        'image_guru' => $image
                    ];
                    $this->guru_model->updateData($where, $dataGuru);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Guru berhasil diubah</div>');
                    redirect('data-guru');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Gagal di upload</div>');
                    redirect('tambah-guru');
                }
            } else {
                $dataGuru = [
                    'nip' => htmlspecialchars($this->input->post('nip')),
                    'nama_guru' => htmlspecialchars($this->input->post('fname')),
                    'jk_guru' => htmlspecialchars($this->input->post('jk')),
                    'agama_guru' => htmlspecialchars($this->input->post('agama')),
                    'tmptlahir' => htmlspecialchars($this->input->post('tempatlhr')),
                    'tgllahir' => strtotime($this->input->post('tanggallhr')),
                    'alamat_guru' => htmlspecialchars($this->input->post('alamat')),
                    'telp_guru' => htmlspecialchars($this->input->post('telp')),
                ];
                $this->guru_model->updateData($where, $dataGuru);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Guru berhasil diubah</div>');
                redirect('data-guru');
            }
        }
    }

    public function delete($id_guru)
    {
        $whereGuru = array('id_guru' => $id_guru);
        $whereUser = array('id_konek' => $id_guru);

        //Execution
        $this->guru_model->deleteData($whereGuru);
        $this->users_model->deleteData($whereUser);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('data-guru');
    }
}
