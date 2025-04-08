<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home/coba-segment/(:alpha)/(:num)/(:alphanum)/(:any)', 'Home::belajar_segment/$1/$2/$3/$4');
