<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong!'
        ]);

        if (isset($_SESSION['username'])) {
            redirect(base_url());
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('frontend/login/index');
            } else {
                $this->_login();
            }
        }
    }

    private function _login()
    {
        //Load
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_user', ['username_user' => $username])->row_array();

        //Execution
        //Cek User
        if ($user) {
            //Cek Password
            if (password_verify($password, $user['password_user'])) {
                //data yang akan dimasukkan session
                $data = [
                    'username' => $user['username_user'],
                    'password' => $user['password_user'],
                    'level' => $user['status_user']
                ];
                $this->session->set_userdata($data); //menyimpan data ke dalam session
                redirect(base_url());
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Coba Lagi</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Coba Lagi</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        //menghapus session
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('level');
    }
}
