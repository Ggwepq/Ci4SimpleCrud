<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Students Routes
$routes->get('/students', 'StudentsController::listStudentRecord');
$routes->get('/students/create', 'StudentsController::createStudentRecord');
