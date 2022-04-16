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
    }
}
