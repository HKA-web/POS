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
$route['default_controller'] = 'login';
$route['administrator']='login';
$route['halaman_utama']='Admin';
$route['halaman_kategori']='kategori';
$route['halaman_supplier']='supplier';
$route['halaman_barang']='barang';
$route['halaman_pembelian']='pembelian';
$route['halaman_penjualan']='penjualan';
$route['laporan_barang']='laporan/barang';
$route['laporan_stok_barang']='laporan/stok_barang';
$route['laporan_barang_kategori']='laporan/kategori_barang';
$route['laporan_periode_pembelian']='laporan/periode_pembelian';
$route['laporan_periode_penjualan']='laporan/periode_penjualan';
$route['laporan_kategori']='laporan/kategori';
$route['laporan_supplier']='laporan/supplier';
$route['laporan_pembelian_perbulan']='laporan/pembelian_perbulan';
$route['laporan_penjualan_perbulan']='laporan/penjualan_perbulan';
$route['halaman_backup']='database/backup';
$route['halaman_restore']='database/restore';
$route['halaman_histori_jual']='penjualan/histori_jual';
$route['keluar']='login/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
