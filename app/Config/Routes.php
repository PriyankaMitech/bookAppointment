<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Admin_Controller::index');
$routes->get('admin_dashboard', 'Admin_Controller::admin_dashboard');
$routes->post('login', 'Admin_Controller::login');
$routes->get('giveslots', 'Admin_Controller::giveslots');





