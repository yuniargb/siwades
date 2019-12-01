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
$route['default_controller'] = 'C_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// login
$route['auth'] = 'C_login/auth';
$route['logout'] = 'C_login/logout';
$route['daftar'] = 'C_login/registrasi';
$route['actdaftar'] = 'C_login/daftar';
$route['validasi'] = 'C_login/get_validasi';
$route['goTo'] = 'C_login/validasi_user';
$route['dashboard'] = 'C_dashboard';

// agama
$route['agama'] = 'C_agama';
$route['storeagama'] = 'C_agama/store';
$route['editagama/(:any)'] = 'C_agama/edit/$1';
$route['updateagama'] = 'C_agama/update';
$route['deleteagama/(:any)'] = 'C_agama/delete/$1';

// dokumen
$route['dokumen'] = 'C_dokumen';
$route['storedokumen'] = 'C_dokumen/store';
$route['editdokumen/(:any)'] = 'C_dokumen/edit/$1';
$route['updatedokumen'] = 'C_dokumen/update';
$route['deletedokumen/(:any)'] = 'C_dokumen/delete/$1';

// klasifikasi
$route['klasifikasi'] = 'C_klasifikasi';
$route['storeklasifikasi'] = 'C_klasifikasi/store';
$route['storedokumenklasifikasi'] = 'C_klasifikasi/storeDokumen';
$route['editklasifikasi/(:any)'] = 'C_klasifikasi/edit/$1';
$route['updateklasifikasi'] = 'C_klasifikasi/update';
$route['deleteklasifikasi/(:any)'] = 'C_klasifikasi/delete/$1';
$route['deletedokumenklasifikasi'] = 'C_klasifikasi/deleteDokumen';
$route['detailklasifikasi/(:any)'] = 'C_klasifikasi/detail/$1';

// kartukeluarga
$route['kartukeluarga'] = 'C_kartukeluarga';
$route['storekartukeluarga'] = 'C_kartukeluarga/store';
$route['storeanggota'] = 'C_kartukeluarga/storeAnggota';
$route['editkartukeluarga/(:any)'] = 'C_kartukeluarga/edit/$1';
$route['updatekartukeluarga'] = 'C_kartukeluarga/update';
$route['deletekartukeluarga/(:any)'] = 'C_kartukeluarga/delete/$1';
$route['deleteanggota/(:any)'] = 'C_kartukeluarga/deleteAnggota/$1';
$route['editanggota/(:any)'] = 'C_kartukeluarga/editAnggota/$1';
$route['updateanggota'] = 'C_kartukeluarga/updateAnggota';
$route['detailkartukeluarga/(:any)'] = 'C_kartukeluarga/detail/$1';
$route['kepalakeluarga'] = 'C_kartukeluarga/kepalakeluarga';

// penduduk
$route['penduduk'] = 'C_penduduk';
$route['editpenduduk/(:any)'] = 'C_penduduk/edit/$1';
$route['updatependuduk'] = 'C_penduduk/update';
$route['deletependuduk/(:any)'] = 'C_penduduk/delete/$1';
$route['detailpenduduk/(:any)/(:any)'] = 'C_penduduk/detail/$1/$2';
$route['addpdf'] = 'C_penduduk/addPdf';
$route['deletepdf'] = 'C_penduduk/deletePdf';
$route['embed/(:any)'] = 'C_penduduk/embed/$1';

// laporan
$route['laporan'] = 'C_laporan';
$route['exlaporan'] = 'C_laporan/export';

// profile
$route['profile'] = 'C_admin';
$route['updateprofile'] = 'C_admin/update';

// chat
$route['chat'] = 'C_chat';
$route['kirimchat'] = 'C_chat/store';
$route['ambilchat'] = 'C_chat/ambil';
