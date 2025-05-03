<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ke landing page
$routes->get('/', 'Home::index');

// ke halaman vendor
$routes->get('/vendor', 'Vendor::index');
$routes->get('/vendor/create', 'Vendor::create');
$routes->post('/vendor/store', 'Vendor::store');
$routes->get('/vendor/edit/(:num)', 'Vendor::edit/$1');
$routes->post('/vendor/update/(:num)', 'Vendor::update/$1');
$routes->get('/vendor/delete/(:num)', 'Vendor::delete/$1');

// ke halaman tender
$routes->get('/tender', 'Tender::index');
$routes->get('/tender/create', 'Tender::create');
$routes->post('/tender/store', 'Tender::store');
$routes->get('/tender/edit/(:num)', 'Tender::edit/$1');
$routes->post('/tender/update/(:num)', 'Tender::update/$1');
$routes->get('/tender/delete/(:num)', 'Tender::delete/$1');

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
