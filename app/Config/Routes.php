<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Admin_Controller::index');
$routes->get('admin_dashboard', 'Admin_Controller::admin_dashboard');
$routes->post('login', 'Admin_Controller::login');
$routes->get('add_schedule', 'Admin_Controller::add_schedule');
$routes->post('set_schedule', 'Admin_Controller::set_schedule');
$routes->post('save_schedule', 'Admin_Controller::save_schedule');
$routes->get('add_workinghour','Admin_Controller::add_workinghour');
$routes->post('set_workinghour', 'Admin_Controller::set_workinghour');
$routes->get('deleteworkinghour/(:any)/(:any)/(:any)', 'Admin_Controller::deleteworkinghour/$1');
$routes->get('calendar', 'Admin_Controller::calendar');












