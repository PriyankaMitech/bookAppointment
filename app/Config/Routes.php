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
$routes->get('my_slots', 'Admin_Controller::my_slots');
$routes->post('updateStatus', 'Admin_Controller::updateStatus');
$routes->get('add_appointment', 'Admin_Controller::Add_student');
$routes->get('Add_class', 'Admin_Controller::Add_class');
$routes->post('getnewslots', 'Admin_Controller::getnewslots');
$routes->post('classForm', 'Admin_Controller::classForm');
$routes->get('logout', 'Admin_Controller::logout');
$routes->get('services', 'Admin_Controller::services');
$routes->post('all_services', 'Admin_Controller::all_services');
$routes->get('Appointment_reports', 'Admin_Controller::Appointment_reports');
$routes->get('services_Reports', 'Admin_Controller::services_Reports');
$routes->post('Appointment_status', 'Admin_Controller::Appointment_status');
$routes->post('freezeSlots', 'Admin_Controller::freezeSlots');
$routes->get('Booked_Slots', 'Admin_Controller::Booked_Slots');
$routes->post('cancelBooking', 'Admin_Controller::cancelBooking');

$routes->post('formdata', 'Admin_Controller::formdata');
$routes->post('getslots', 'Admin_Controller::getslots');
$routes->post('add_appointment', 'Admin_Controller::add_appointment');











