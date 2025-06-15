<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ke landing page
$routes->get('/', 'Home::index');

// ke halaman vendor
$routes->get('/vendor', 'Master\VendorController::index'); // Menampilkan halaman index vendor
$routes->get('/vendor/create', 'Master\VendorController::create'); // Menampilkan halaman create vendor
$routes->post('/vendor/store', 'Master\VendorController::store');
$routes->get('/vendor/edit/(:num)', 'Master\VendorController::edit/$1');
$routes->post('/vendor/update/(:num)', 'Master\VendorController::update/$1');
$routes->get('/vendor/delete/(:num)', 'Master\VendorController::delete/$1');

// ke halaman tender
$routes->get('/tender', 'Master\TenderController::index'); // Menampilkan halaman index tender
$routes->get('/tender/create', 'Master\TenderController::create');     // Menampilkan halaman create tender
$routes->post('/tender/store', 'Master\TenderController::store');
$routes->get('/tender/edit/(:num)', 'Master\TenderController::edit/$1');
$routes->post('/tender/update/(:num)', 'Master\TenderController::update/$1');
$routes->get('/tender/delete/(:num)', 'Master\TenderController::delete/$1');

//ke halaman Kategori_Tender
$routes->get('/kategori_tender', 'KategoriTender::index');
$routes->get('/kategori_tender/create', 'KategoriTender::create');
$routes->post('/kategori_tender/store', 'KategoriTender::store');
$routes->get('/kategori_tender/edit/(:num)', 'KategoriTender::edit/$1');
$routes->post('/kategori_tender/update/(:num)', 'KategoriTender::update/$1');
$routes->get('/kategori_tender/delete/(:num)', 'KategoriTender::delete/$1');

//ke halaman Sertikasi_Tender
$routes->get('/sertifikasi_tender', 'SertifikasiTender::index');
$routes->get('/sertifikasi_tender/create', 'SertifikasiTender::create');
$routes->post('/sertifikasi_tender/store', 'SertifikasiTender::store');
$routes->get('/sertifikasi_tender/edit/(:num)', 'SertifikasiTender::edit/$1');
$routes->post('/sertifikasi_tender/update/(:num)', 'SertifikasiTender::update/$1');
$routes->get('/sertifikasi_tender/delete/(:num)', 'SertifikasiTender::delete/$1');

// Routes untuk Pengajuan Tender
$routes->get('/pengajuan', 'PengajuanTenderController::index');
$routes->get('/pengajuan/create', 'PengajuanTenderController::create');
$routes->post('/pengajuan/store', 'PengajuanTenderController::store');
$routes->get('/pengajuan/edit/(:num)', 'PengajuanTenderController::edit/$1');
$routes->post('/pengajuan/update', 'PengajuanTenderController::update');
$routes->get('/pengajuan/delete/(:num)', 'PengajuanTenderController::delete/$1');

