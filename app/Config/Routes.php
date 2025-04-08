<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AdminController::login');
$routes->get('/home/coba-segment/(:alpha)/(:num)/(:alphanum)/(:any)', 'Home::belajar_segment/$1/$2/$3/$4');
$routes->get('/admin/login-admin', 'AdminController::login');
