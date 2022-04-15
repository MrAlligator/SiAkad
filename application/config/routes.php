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

//Frontend
$route['guru'] = 'frontend/guru';
$route['siswa'] = 'frontend/siswa';
$route['detail-siswa/(:any)'] = function ($id_siswa) {
    return 'frontend/siswa/detail/' . $id_siswa;
};

/* Backend */
//Admin
$route['dashboard'] = 'backend/home';

//Admin Read
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

//Admin Create
$route['tambah-siswa'] = 'backend/siswa/create';
$route['tambah-guru'] = 'backend/guru/create';
$route['tambah-karyawan'] = 'backend/karyawan/create';
$route['tambah-galeri'] = 'backend/galeri/create';
$route['tambah-prestasi'] = 'backend/prestasi/create';

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

//Guru
$route['guru/nilai'] = 'guru/nilai';

//Guru Input
$route['guru/input-nilai'] = 'guru/nilai/input';
