<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['title'] = "beranda";
		$this->load->view('frontend/_partials/head', $data);
		$this->load->view('frontend/_partials/header');
		$this->load->view('frontend/_partials/homebanner');
		$this->load->view('frontend/home/index');
		$this->load->view('frontend/_partials/footer');
		$this->load->view('frontend/_partials/js');
	}

	public function sambutan()
	{
		$data['title'] = "sambutan kepala sekolah";
		$this->load->view('frontend/_partials/head', $data);
		$this->load->view('frontend/_partials/header');
		$this->load->view('frontend/_partials/banner', $data);
		$this->load->view('frontend/home/sambutan');
		$this->load->view('frontend/_partials/footer');
		$this->load->view('frontend/_partials/js');
	}
	public function sejarah()
	{
		$data['title'] = "sejarah";
		$this->load->view('frontend/_partials/head', $data);
		$this->load->view('frontend/_partials/header');
		$this->load->view('frontend/_partials/banner', $data);
		$this->load->view('frontend/home/sejarah');
		$this->load->view('frontend/_partials/footer');
		$this->load->view('frontend/_partials/js');
	}
	public function profilSingkat()
	{
		$data['title'] = "profil wingkat";
		$this->load->view('frontend/_partials/head', $data);
		$this->load->view('frontend/_partials/header');
		$this->load->view('frontend/_partials/banner', $data);
		$this->load->view('frontend/home/profilSingkat');
		$this->load->view('frontend/_partials/footer');
		$this->load->view('frontend/_partials/js');
	}
	public function visiMisi()
	{
		$data['title'] = "Visi dan Misi";
		$this->load->view('frontend/_partials/head', $data);
		$this->load->view('frontend/_partials/header');
		$this->load->view('frontend/_partials/banner', $data);
		$this->load->view('frontend/home/visiMisi');
		$this->load->view('frontend/_partials/footer');
		$this->load->view('frontend/_partials/js');
	}
	public function struktur()
	{
		$data['title'] = "struktur";
		$this->load->view('frontend/_partials/head', $data);
		$this->load->view('frontend/_partials/header');
		$this->load->view('frontend/_partials/banner', $data);
		$this->load->view('frontend/home/struktur');
		$this->load->view('frontend/_partials/footer');
		$this->load->view('frontend/_partials/js');
	}
	public function multimedia()
	{
		$data['title'] = "multimedia";
		$this->load->view('frontend/_partials/head', $data);
		$this->load->view('frontend/_partials/header');
		$this->load->view('frontend/_partials/banner', $data);
		$this->load->view('frontend/home/multimedia');
		$this->load->view('frontend/_partials/footer');
		$this->load->view('frontend/_partials/js');
	}
}
