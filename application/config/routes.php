<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEFAULT CONTROLLER
|--------------------------------------------------------------------------
| Halaman pertama yang dibuka user
*/
$route['default_controller'] = 'home';

/*
|--------------------------------------------------------------------------
| ROUTE USER (JANGAN DIUBAH)
|--------------------------------------------------------------------------
*/
$route['produk']                 = 'produk';
$route['produk/(:num)']          = 'produk/detail/$1';

$route['cart']                   = 'cart/index';
$route['cart/tambah/(:num)']     = 'cart/tambah/$1';
$route['cart/hapus/(:num)']      = 'cart/hapus/$1';
$route['cart/update']            = 'cart/update';

$route['checkout']               = 'checkout/index';
$route['checkout/proses']        = 'checkout/proses';

$route['transaksi']              = 'transaksi';

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
$route['login']                  = 'auth/login';
$route['register']               = 'auth/register';
$route['logout']                 = 'auth/logout';

/*
|--------------------------------------------------------------------------
| ADMIN AUTH & DASHBOARD
|--------------------------------------------------------------------------
| Admin WAJIB login dulu
*/
$route['admin']                  = 'admin/auth/login';
$route['admin/login']            = 'admin/auth/login';
$route['admin/logout']           = 'admin/auth/logout';
$route['admin/dashboard']        = 'admin/dashboard';

/*
|--------------------------------------------------------------------------
| ADMIN - PRODUK (CRUD)
|--------------------------------------------------------------------------
*/
$route['admin/produk']                   = 'admin/produk/index';
$route['admin/produk/tambah']            = 'admin/produk/tambah';
$route['admin/produk/simpan']            = 'admin/produk/simpan';
$route['admin/produk/edit/(:num)']       = 'admin/produk/edit/$1';
$route['admin/produk/update/(:num)']     = 'admin/produk/update/$1';
$route['admin/produk/hapus/(:num)']      = 'admin/produk/hapus/$1';

/*
|--------------------------------------------------------------------------
| ADMIN - KATEGORI (CRUD)  (siap dipakai nanti)
|--------------------------------------------------------------------------
*/
$route['admin/kategori']                 = 'admin/kategori/index';
$route['admin/kategori/tambah']          = 'admin/kategori/tambah';
$route['admin/kategori/simpan']          = 'admin/kategori/simpan';
$route['admin/kategori/edit/(:num)']     = 'admin/kategori/edit/$1';
$route['admin/kategori/update/(:num)']   = 'admin/kategori/update/$1';
$route['admin/kategori/hapus/(:num)']    = 'admin/kategori/hapus/$1';

/*
|--------------------------------------------------------------------------
| ADMIN - CUSTOMER (TAMBAHAN AMAN)
|--------------------------------------------------------------------------
| Mengambil data dari tabel `users` role = user
*/
$route['admin/customer']                 = 'admin/customer/index';
$route['admin/customer/delete/(:num)']   = 'admin/customer/delete/$1';

/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
