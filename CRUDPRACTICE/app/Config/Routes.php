<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//database connection checker
$routes->get('/conn', 'DatabaseChecker::index');
//regisration
$routes->get('/register', 'RegistrationController::registerView');
$routes->post('/registerAccount', 'RegistrationController::registerAccount');
//login
$routes->get('/login', 'LoginController::loginView');
$routes->post('/loginAccount', 'LoginController::login');

//landing
$routes->get('/landing', 'PageController::landing');
