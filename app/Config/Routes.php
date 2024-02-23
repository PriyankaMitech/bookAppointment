<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('login', 'Admin_Controller::index');
$routes->get('/', 'Admin_Controller::index');
$routes->get('admin_dashboard', 'Admin_Controller::admin_dashboard');
$routes->post('login', 'Admin_Controller::login');





