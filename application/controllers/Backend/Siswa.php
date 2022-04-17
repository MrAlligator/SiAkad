<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
        $this->load->model('users_model');
    }

    public function index()
    {
        $data['start'] = 0;
        $data['is_active'] = 'ssw';
        $data['title'] = "Siswa | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['students'] = $this->siswa_model->getAll();
        $data['count'] = $this->siswa_model->count();

        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/siswa/index', $data);
        $this->load->view('backend/_partials/foot', $data);
    }

    public function create()
    {
        $data['start'] = 0;
        $data['is_active'] = 'ssw';
        $data['title'] = "Tambah Data Siswa | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Tambah Data Siswa';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['students'] = $this->siswa_model->getAll();
        $data['count'] = $this->siswa_model->count();
        $last_id = $this->siswa_model->get_latest_id_user();

        $this->form_validation->set_rules('fname', 'Nama Depan', 'required|trim', [
            'required' => 'Nama Depan tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('lname', 'Nama Belakang', 'required|trim', [
            'required' => 'Nama Belakang tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim', [
            'required' => 'NIS tidak boleh kosong!'
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
            $this->load->view('backend/data/siswa/add', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            //Config upload
            $config['upload_path'] = './assets/img/siswa/'; //path folder upload
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
                    $config['source_image'] = './assets/img/siswa/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 710; //menentukan lebar
                    $config['height'] = 420; //menentukan tinggi
                    $config['new_image'] = './assets/img/siswa/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    $dataSiswa = [
                        'nis' => htmlspecialchars($this->input->post('nis')),
                        'nama_siswa' => htmlspecialchars($this->input->post('fname') . ' ' . $this->input->post('lname')),
                        'kelas' => htmlspecialchars($this->input->post('kelas')),
                        'jk_siswa' => htmlspecialchars($this->input->post('jk')),
                        'agama_siswa' => htmlspecialchars($this->input->post('agama')),
                        'tmptlhr_siswa' => htmlspecialchars($this->input->post('tempatlhr')),
                        'tgllhr_siswa' => strtotime($this->input->post('tanggallhr')),
                        'alamat_siswa' => htmlspecialchars($this->input->post('alamat')),
                        'telp_siswa' => htmlspecialchars($this->input->post('telp')),
                        'foto_siswa' => $image
                    ];
                    $dataLogin = [
                        'id_konek' => $last_id['id_siswa'] + 1,
                        'username_user' => $this->input->post('nis'),
                        'password_user' => password_hash($this->input->post('nis'), PASSWORD_DEFAULT),
                        'viewpassword_user' => $this->input->post('nis'),
                        'status_user' => 5
                    ];
                    $this->siswa_model->inputData($dataSiswa);
                    $this->users_model->inputData($dataLogin);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Siswa berhasil ditambahkan</div>');
                    redirect('data-siswa');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Gagal di upload</div>');
                    redirect('tambah-siswa');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Perhatikan gambar yang diupload</div>');
                redirect('tambah-siswa');
            }
        }
    }

    public function update($id_siswa)
    {
        $where = array('id_siswa' => $id_siswa);
        $data['start'] = 0;
        $data['is_active'] = 'ssw';
        $data['title'] = "Edit Data Siswa | SIAKAD SMK DARUSSALAM";
        $data['pageTitle'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('tb_user', ['username_user' => $this->session->userdata('username')])->row_array();
        $data['studentdata'] = $this->siswa_model->getById($where);
        $data['count'] = $this->siswa_model->count();

        $this->form_validation->set_rules('fname', 'Nama Depan', 'required|trim', [
            'required' => 'Nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim', [
            'required' => 'NIS tidak boleh kosong!'
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
            $this->load->view('backend/data/siswa/edit', $data);
            $this->load->view('backend/_partials/foot', $data);
        } else {
            //Config upload
            $config['upload_path'] = './assets/img/siswa/'; //path folder upload
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
                    $config['source_image'] = './assets/img/siswa/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 710; //menentukan lebar
                    $config['height'] = 420; //menentukan tinggi
                    $config['new_image'] = './assets/img/siswa/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    $dataSiswa = [
                        'nis' => htmlspecialchars($this->input->post('nis')),
                        'nama_siswa' => htmlspecialchars($this->input->post('fname')),
                        'kelas' => htmlspecialchars($this->input->post('kelas')),
                        'jk_siswa' => htmlspecialchars($this->input->post('jk')),
                        'agama_siswa' => htmlspecialchars($this->input->post('agama')),
                        'tmptlhr_siswa' => htmlspecialchars($this->input->post('tempatlhr')),
                        'tgllhr_siswa' => strtotime($this->input->post('tanggallhr')),
                        'alamat_siswa' => htmlspecialchars($this->input->post('alamat')),
                        'telp_siswa' => htmlspecialchars($this->input->post('telp')),
                        'foto_siswa' => $image
                    ];
                    $this->siswa_model->updateData($where, $dataSiswa);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Siswa berhasil diubah</div>');
                    redirect('data-siswa');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Gagal di upload</div>');
                    redirect('tambah-siswa');
                }
            } else {
                $dataSiswa = [
                    'nis' => htmlspecialchars($this->input->post('nis')),
                    'nama_siswa' => htmlspecialchars($this->input->post('fname')),
                    'kelas' => htmlspecialchars($this->input->post('kelas')),
                    'jk_siswa' => htmlspecialchars($this->input->post('jk')),
                    'agama_siswa' => htmlspecialchars($this->input->post('agama')),
                    'tmptlhr_siswa' => htmlspecialchars($this->input->post('tempatlhr')),
                    'tgllhr_siswa' => strtotime($this->input->post('tanggallhr')),
                    'alamat_siswa' => htmlspecialchars($this->input->post('alamat')),
                    'telp_siswa' => htmlspecialchars($this->input->post('telp')),
                ];
                $this->siswa_model->updateData($where, $dataSiswa);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Siswa berhasil diubah</div>');
                redirect('data-siswa');
            }
        }
    }

    public function delete($id_siswa)
    {
        $whereSiswa = array('id_siswa' => $id_siswa);
        $whereUser = array('id_konek' => $id_siswa);

        //Execution
        $this->siswa_model->deleteData($whereSiswa);
        $this->users_model->deleteData($whereUser);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('data-siswa');
    }
}
