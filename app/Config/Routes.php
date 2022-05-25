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
$routes->setAutoRoute(false); //jika false maka semua akses controller lewat route dulu (defaultnya true)

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Auth\Auth::index');
$routes->group('', ['namespace' => '\App\Controllers\Auth','filter' => 'noauth'], function ($routes) {
	$routes->get('/', 'Auth::index');
});

$routes->group('login', ['namespace' => '\App\Controllers\Auth','filter' => 'noauth'], function ($routes) {
	$routes->get('/', 'Auth::index');
	$routes->post('cekLogin', 'Auth::cekLogin');
});
$routes->get('logout', 'Auth\Auth::logout');

$routes->group('super', ['namespace' => '\App\Controllers\Super','filter' => 'auth'], function ($routes) {
	$routes->match(['get', 'post'], '/', 'Super::index');
	//dashboard
	$routes->match(['get', 'post'], 'dashboard', 'Super::dashboard');
	//manajemen
	$routes->match(['get', 'post'], 'manajemen', 'Super::manajemen');
	$routes->post('input_UG', 'Super::input_UG');
	$routes->post('insert_UG', 'Super::insert_UG');
	$routes->post('edit_UG', 'Super::edit_UG');
	$routes->post('update_UG', 'Super::update_UG');
	$routes->post('delete_UG', 'Super::delete_UG');
	//menu
	$routes->match(['get', 'post'], 'menu/(:num)', 'Super::menu/$1');
	$routes->post('input_Menu', 'Super::input_Menu');
	$routes->post('insert_Menu', 'Super::insert_Menu');
	$routes->post('edit_Menu', 'Super::edit_Menu');
	$routes->post('update_Menu', 'Super::update_Menu');
	$routes->post('delete_Menu', 'Super::delete_Menu');
	//datauser
	$routes->match(['get', 'post'], 'data_user', 'Super::data_user');
	$routes->post('data_tables_user', 'Super::data_tables_user');
	$routes->post('input_User', 'Super::input_User');
	$routes->post('insert_User', 'Super::insert_User');
	$routes->post('edit_User', 'Super::edit_User');
	$routes->post('update_User', 'Super::update_User');
	$routes->post('delete_User', 'Super::delete_User');
	//loguser
	$routes->match(['get', 'post'], 'data_log', 'Super::data_log');
	$routes->post('data_tables_log', 'Super::data_tables_log');
	$routes->post('delete_Log', 'Super::delete_Log');
	//configurationapp
	$routes->match(['get', 'post'], 'config_app', 'Super::config_app');
	$routes->post('update_Config', 'Super::update_Config');
	
});

//---------------------------------------------------------------------------------
$routes->group('profile', ['namespace' => '\App\Controllers\Uprofile','filter' => 'auth'], function ($routes) {
	$routes->match(['get', 'post'], '/', 'Uprofile::index');
	$routes->post('update_Profile', 'Uprofile::update_Profile');
	$routes->match(['get', 'post'], '/', 'Uprofile::new_password');
	$routes->post('update_Password', 'Uprofile::update_Password');
});

//---------------------------------------------------------------------------------
$routes->group('dashboard', ['namespace' => '\App\Controllers','filter' => 'auth'], function ($routes) {
	$routes->match(['get', 'post'], '/', 'Dashboard::index');
});

//data_resi------------------------------------------------------------------------
$routes->group('data_resi', ['namespace' => '\App\Controllers','filter' => 'auth'], function ($routes) {
	$routes->match(['get', 'post'], '/', 'Data_resi::index');
	$routes->post('data_tables', 'Data_resi::data_tables');
	$routes->post('input_data', 'Data_resi::input_data');
	$routes->post('insert_data', 'Data_resi::insert_data');
	$routes->post('edit_data', 'Data_resi::edit_data');
	$routes->post('update_data', 'Data_resi::update_data');
	$routes->post('delete_data', 'Data_resi::delete_data');
});

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
