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
//logout
$routes->post('/logout', 'LoginController::logout');
//landing
$routes->get('/landing', 'PageController::landing');

//edit page
$routes->get('/profile/edit', 'FunctionController::edit');

//edit own info in own account
$routes->post('/editInfo', 'FunctionController::editInfo');

//admin page
$routes->get('/adminLogin', 'AdminController::adminLoginView');
$routes->get('/adminCreateAccount', 'AdminController::createAdminAccount');

$routes->post('/registerAdmin', 'AdminController::registerAdmin');
$routes->post('/adminLogin', 'AdminController::adminLogin');

$routes->get('/admin/showUsers', 'AdminController::getAllUsers');

//admin landing
$routes->get('/adminLanding', 'AdminController::adminLanding');
