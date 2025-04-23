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
