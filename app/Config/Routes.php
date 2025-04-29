<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::login');
$routes->get('/admin/dashboard-admin', 'Admin::dashboard');

//routes untuk login admin
$routes->get('/admin/login-admin', 'Admin::login');
$routes->post('/admin/autentikasi-login', 'Admin::autentikasi');

// routes untuk logout admin
$routes->get('/admin/logout-admin', 'Admin::logout');

// routes untuk module admin
$routes->get('/admin/master-data-admin', 'Admin::master_data_admin');
$routes->get('/admin/input-data-admin', 'Admin::input_data_admin');
$routes->post('/admin/simpan-admin', 'Admin::simpan_data_admin');
$routes->get('/admin/edit-data-admin/(:alphanum)', 'Admin::edit_data_admin/$1');
$routes->post('/admin/update-admin', 'Admin::update_data_admin');
$routes->get('/admin/hapus-data-admin/(:alphanum)', 'Admin::hapus_data_admin/$1');
