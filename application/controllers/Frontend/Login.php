<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index()
    {
        $data = [
            'username_user' => 'admin',
            'password_user' => password_hash('admin', PASSWORD_DEFAULT),
            'viewpassword_user' => 'admin',
            'status_user' => 1
        ];
        $this->users_model->inputData($data);
        echo 'Data berhasil ditambahkan';
        // $this->load->view('frontend/login/index');
    }
}
