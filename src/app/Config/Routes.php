<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Login Routes
$routes->post('/login', 'Signin::login');
$routes->get('/logout', 'Signin::logout');
$routes->get('/signup', 'Signup::index');
$routes->get('/signin', 'Signin::index');

//User Routes
$routes->post('/user/store', 'Signup::store');

//Supplier Routes
$routes->get('supplier/list', 'Supplier::index',['filter' => 'authGuard']);
$routes->get('supplier/create', 'Supplier::create',['filter' => 'authGuard']);
$routes->post('supplier/store', 'Supplier::store',['filter' => 'authGuard']);
$routes->get('supplier/edit/(:num)', 'Supplier::singleSupplier/$1',['filter' => 'authGuard']);
$routes->post('supplier/update', 'Supplier::update',['filter' => 'authGuard']);
$routes->get('supplier/delete/(:num)', 'Supplier::delete/$1',['filter' => 'authGuard']);

//Bank Account Routes
$routes->get('bankaccount/list/(:num)', 'BankAccount::index/$1',['filter' => 'authGuard']);
$routes->get('bankaccount/create/(:num)', 'BankAccount::create/$1',['filter' => 'authGuard']);
$routes->post('bankaccount/store', 'BankAccount::store',['filter' => 'authGuard']);
$routes->get('bankaccount/edit/(:num)', 'BankAccount::singleBankAccount/$1',['filter' => 'authGuard']);
$routes->post('bankaccount/update', 'BankAccount::update',['filter' => 'authGuard']);
$routes->get('bankaccount/delete/(:num)', 'BankAccount::delete/$1',['filter' => 'authGuard']);

//Dashboard Route
$routes->get('/dashboard', 'Home::index', ['filter' => 'authGuard']);
$routes->get('/', 'Home::index', ['filter' => 'authGuard']);



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
