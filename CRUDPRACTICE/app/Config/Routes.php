<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// ✅ Database connection checker
$routes->get('/conn', 'DatabaseChecker::index');

// ================= USER AUTH ================= //
// Registration
$routes->get('/register', 'RegistrationController::registerView');
$routes->post('/registerAccount', 'RegistrationController::registerAccount');

// Login
$routes->get('/login', 'LoginController::loginView');
$routes->post('/loginAccount', 'LoginController::login');

// Logout
$routes->post('/logout', 'LoginController::logout');

// ================= USER PAGES ================= //
$routes->group('user', ['filter' => 'role:user'], function ($routes) {
    $routes->get('landing', 'PageController::landing');
    $routes->get('profile/edit', 'FunctionController::edit');
    $routes->post('profile/editInfo', 'FunctionController::editInfo');
});

// ================= ADMIN AUTH ================= //
$routes->get('/adminLogin', 'AdminController::adminLoginView');
$routes->get('/adminCreateAccount', 'AdminController::createAdminAccount');

$routes->post('/registerAdmin', 'AdminController::registerAdmin');
$routes->post('/adminLogin', 'AdminController::adminLogin');

// ================= ADMIN PAGES ================= //
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('landing', 'AdminController::adminLanding');
    $routes->get('showUsers', 'AdminController::getAllUsers');
    $routes->get('createFromAdmin', 'AdminController::createFromAdmin');
    $routes->post('registerAccountFromAdmin', 'RegistrationController::registerAccountFromAdmin');
    $routes->post('user/delete/(:num)', 'AdminController::deleteUser/$1');
});
