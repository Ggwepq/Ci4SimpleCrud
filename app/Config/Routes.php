<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Students Routes
$routes->get('/students', 'StudentsController::listStudentRecord');
$routes->get('/students/create', 'StudentsController::createStudentRecord');
$routes->post('/students/store', 'StudentsController::storeStudentRecord');
$routes->get('/students/edit/(:num)', 'StudentsController::editStudentRecord/$1');
$routes->post('/students/update/(:num)', 'StudentsController::updateStudentRecord/$1');
$routes->get('/students/delete/(:num)', 'StudentsController::deleteStudentRecord/$1');
