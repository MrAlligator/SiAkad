<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Login
$route['login'] = 'frontend/login';
$route['logout'] = 'frontend/login/logout';

/* Frontend */
//Data Guru
$route['guru'] = 'frontend/guru';
$route['detail-guru/(:any)'] = function ($id_siswa) {
    return 'frontend/siswa/detail/' . $id_siswa;
};

//Data Siswa
$route['siswa'] = 'frontend/siswa';
$route['detail-siswa/(:any)'] = function ($id_siswa) {
    return 'frontend/siswa/detail/' . $id_siswa;
};
//Profil Sekolah
$route['sambutan'] = 'welcome/sambutan';
$route['sejarah'] = 'welcome/sejarah';
$route['profil-singkat'] = 'welcome/profilSingkat';
$route['visi-misi'] = 'welcome/visiMisi';
$route['struktur'] = 'welcome/struktur';

//Admin
$route['jurusan-multimedia'] = 'welcome/multimedia';

/* Backend */
//Admin
$route['dashboard'] = 'backend/home';

//Admin Read
$route['administrator/data-calon-siswa-baru'] = 'backend/pendaftaran/calon';
$route['administrator/data-jadwal-pembelajaran'] = 'backend/jadwal/index_admin';
$route['data-berita'] = 'backend/berita';
$route['data-pengumuman'] = 'backend/pengumuman';
$route['data-siswa'] = 'backend/siswa';
$route['data-guru'] = 'backend/guru';
$route['data-karyawan'] = 'backend/karyawan';
$route['data-absensi'] = 'backend/absensi';
$route['data-galeri'] = 'backend/galeri';
$route['data-prestasi'] = 'backend/prestasi';
$route['data-walikelas'] = 'backend/walikelas';
$route['data-materi'] = 'backend/materi';
$route['data-mapel'] = 'backend/mapel';
$route['data-jurusan'] = 'backend/jurusan';
$route['data-pengajar'] = 'backend/pengajar';
$route['lihat-berita/(:any)'] = function ($slug_konten) {
    return 'backend/berita/read' . '/' . $slug_konten;
};
$route['lihat-pengumuman/(:any)'] = function ($slug_konten) {
    return 'backend/pengumuman/read' . '/' . $slug_konten;
};

//Admin Create
$route['tambah-siswa'] = 'backend/siswa/create';
$route['tambah-guru'] = 'backend/guru/create';
$route['tambah-karyawan'] = 'backend/karyawan/create';
$route['tambah-galeri'] = 'backend/galeri/create';
$route['tambah-prestasi'] = 'backend/prestasi/create';
$route['tambah-berita'] = 'backend/berita/create';
$route['tambah-pengumuman'] = 'backend/pengumuman/create';
$route['tambah-mapel'] = 'backend/mapel/create';
$route['tambah-jurusan'] = 'backend/jurusan/create';
$route['tambah-pengajar'] = 'backend/pengajar/create';
$route['administrator/tambah-jadwal-pembelajaran'] = 'backend/jadwal/create';
$route['administrator/verify'] = 'backend/pendaftaran/terima';

//Admin Delete
$route['hapus-siswa/(:num)'] = function ($id_siswa) {
    return 'backend/siswa/delete' . '/' . $id_siswa;
};
$route['hapus-guru/(:num)'] = function ($id_guru) {
    return 'backend/guru/delete' . '/' . $id_guru;
};
$route['hapus-karyawan/(:num)'] = function ($id_guru) {
    return 'backend/karyawan/delete' . '/' . $id_guru;
};
$route['hapus-galeri/(:num)'] = function ($id_media) {
    return 'backend/galeri/delete' . '/' . $id_media;
};
$route['hapus-prestasi/(:num)'] = function ($id_prestasi) {
    return 'backend/prestasi/delete' . '/' . $id_prestasi;
};
$route['hapus-berita/(:num)'] = function ($id_konten) {
    return 'backend/berita/delete' . '/' . $id_konten;
};
$route['hapus-pengumuman/(:num)'] = function ($id_konten) {
    return 'backend/pengumuman/delete' . '/' . $id_konten;
};
$route['hapus-mapel/(:num)'] = function ($id_mapel) {
    return 'backend/mapel/delete' . '/' . $id_mapel;
};
$route['hapus-jurusan/(:num)'] = function ($id_jurusan) {
    return 'backend/jurusan/delete' . '/' . $id_jurusan;
};
$route['hapus-pengajar/(:num)'] = function ($id_pengajar) {
    return 'backend/pengajar/delete' . '/' . $id_pengajar;
};
$route['administrator/hapus-jadwal-pembelajaran/(:num)'] = function ($id_jadwal) {
    return 'backend/jadwal/delete' . '/' . $id_jadwal;
};

//Admin Update
$route['ubah-siswa/(:num)'] = function ($id_siswa) {
    return 'backend/siswa/update' . '/' . $id_siswa;
};
$route['ubah-guru/(:num)'] = function ($id_guru) {
    return 'backend/guru/update' . '/' . $id_guru;
};
$route['ubah-karyawan/(:num)'] = function ($id_guru) {
    return 'backend/karyawan/update' . '/' . $id_guru;
};
$route['ubah-berita/(:any)'] = function ($slug_konten) {
    return 'backend/berita/update' . '/' . $slug_konten;
};
$route['ubah-pengumuman/(:any)'] = function ($slug_konten) {
    return 'backend/pengumuman/update' . '/' . $slug_konten;
};

//Guru
$route['guru/nilai'] = 'backend/nilai';
$route['guru/jadwal'] = 'backend/jadwal';
$route['guru/materi'] = 'backend/materi';

//Guru Input
$route['guru/cari-nilai'] = 'backend/nilai/cari';
$route['guru/data-nilai/(:num)'] = function ($id) {
    return 'backend/nilai/data_nilai/' . $id;
};
$route['guru/input-nilai'] = 'backend/nilai/input';
$route['tambah-materi'] = 'backend/materi/create';

//Karyawan
$route['karyawan/pendaftaran'] = 'backend/pendaftaran';
$route['karyawan/verifikasi'] = 'backend/pendaftaran/verify';

//Karyawan Input
$route['karyawan/input-calon-siswa-baru'] = 'backend/pendaftaran/create';

//Karyawan Delete
$route['karyawan/hapus-calon-siswa-baru/(:num)'] = function ($id_pendaftaran) {
    return 'backend/pendaftaran/delete' . '/' . $id_pendaftaran;
};

//Karyawan Update
$route['karyawan/verified/(:num)'] = function ($id_pendaftaran) {
    return 'backend/pendaftaran/confirmVerify' . '/' . $id_pendaftaran;
};
