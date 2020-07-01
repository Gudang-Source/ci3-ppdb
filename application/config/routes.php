<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Display_controller';
$route['pendaftaran'] = 'Display_controller/pendaftaran';
$route['pendaftaran/kirim'] = 'Formulir_controller/addFormulir';
$route['penerimaan'] = 'Display_controller/penerimaan';
$route['penerimaan/hasil'] = 'Display_controller/displayHasilPenerimaan';
$route['download'] = 'Display_controller/download';
$route['login'] = 'Display_controller/login';
$route['login/verifikasi'] = 'Auth_controller/verifikasi';
$route['auth/logout'] = 'Auth_controller/logout';
$route['admin/dashboard'] = 'Display_controller/displayDashboard';
$route['admin/berita/editor'] = 'Display_controller/displayEditor';
$route['admin/berita/list'] = 'Display_controller/displayAllBerita';
$route['admin/berita/create'] = 'Berita_controller/createBerita';
$route['admin/berita/images-upload'] = 'Berita_controller/uploadImagesContent';
$route['admin/berita/update'] = 'Berita_controller/updateBerita';
$route['admin/berita/update/(:num)'] = 'Berita_controller/updateBeritaById/$1';
$route['admin/berita/delete'] = 'Berita_controller/deleteBeritaById';
$route['admin/formulir/masuk'] = 'Display_controller/displayAllFormulir';
$route['admin/formulir/detail/(:any)'] = 'Display_controller/displayDetailFormulir/$1';
$route['admin/formulir/konfirmasi'] = 'Formulir_controller/confirmFormulir';
$route['admin/formulir/buat'] = 'Display_controller/displayCreateFormulir';
$route['admin/penerimaan/dikonfirmasi'] = 'Display_controller/displayAllConfirmed';
$route['admin/penerimaan/diterima'] = 'Penerimaan_controller/diterima';
$route['admin/penerimaan/ditolak'] = 'Penerimaan_controller/ditolak';
$route['admin/arsip/penerimaan'] = 'Display_controller/displayArsipPenerimaan';
$route['admin/settings/panel'] = 'Display_controller/displaySettings';
$route['admin/settings/home'] = 'Settings_controller/updateActiveContent';
$route['admin/settings/dates'] = 'Settings_controller/updateDates';
$route['admin/settings/contacts'] = 'Settings_controller/updateContacts';
$route['admin/settings/upload-doc'] = 'Settings_controller/uploadFilesDoc';
$route['admin/settings/upload-car'] = 'Settings_controller/uploadFilesImage';
$route['admin/settings/delete-file'] = 'Settings_controller/deleteFile';
$route['admin/personal/resetpass'] = 'Display_controller/displayResetPassword';
$route['admin/reset/password'] = 'Auth_controller/updateNewPassword';
$route['admin/users/list'] = 'Display_controller/displayUser';
$route['admin/users/resetpass'] = 'Users_controller/resetPass';
$route['admin/users/delete'] = 'Users_controller/deleteUser';
$route['admin/users/create'] = 'Display_controller/displayCreateUser';
$route['admin/users/insert'] = 'Users_controller/addUser';
$route['admin/cetak/formulir/(:any)'] = 'Pencetakan_controller/cetakFormulirSiswa/$1';
$route['admin/cetak/presensi'] = 'Pencetakan_controller/cetakPresensiSiswa';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;