<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Main::index');
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');

// Main Routes
$routes->group('/', function ($routes) {
	$routes->add('', 'Main::index');
	$routes->add('searchresult', 'Main::searchresult');
	$routes->add('vendor', 'Main::vendor');
	$routes->add('vendor/products', 'Main::vendorProduct');
	$routes->add('productdetail', 'Main::productdetail');
	$routes->add('cart', 'Main::cart');
	$routes->add('checkout', 'Main::checkout');
});


// routes for admin
$routes->group('admin', function ($routes) {
	$routes->add('/', 'Admin\Dashboard::index', ['filter' => 'role:Admin']);
	$routes->add('dashboard', 'Admin\Dashboard::index', ['filter' => 'role:Admin']);
	// admin/users
	$routes->group('users', function ($routes) {
		$routes->add('/', 'Admin\User::index');
		$routes->add('profile/(:num)', 'Admin\User::profile/$1');
		$routes->add('vendor/(:num)', 'Admin\User::vendor/$1');
		// admin/users/roles
		$routes->group('roles', function ($routes) {
			$routes->add('/', 'Admin\UserRole::index');
			$routes->add('add', 'Admin\UserRole::add');
			$routes->add('save', 'Admin\UserRole::save');
			$routes->add('edit/(:num)', 'Admin\UserRole::edit/$1');
			$routes->add('update/(:num)', 'Admin\UserRole::update/$1');
			$routes->add('detail/(:num)', 'Admin\UserRole::detail/$1');
		});
	});
	// admin/vendors
	$routes->group('vendors', function ($routes) {
		$routes->add('/', 'Admin\Vendor::index');
		$routes->add('detail/(:num)', 'Admin\Vendor::detail/$1');
		$routes->add('edit/(:num)', 'Admin\Vendor::edit/$1');
		// admin/vendors/services
		$routes->group('services', function ($routes) {
			$routes->add('/', 'Admin\VendorService::index');
			$routes->add('add', 'Admin\VendorService::add');
			$routes->add('save', 'Admin\VendorService::save');
			$routes->add('edit/(:num)', 'Admin\VendorService::edit/$1');
			$routes->add('update/(:num)', 'Admin\VendorService::update/$1');
			$routes->add('detail/(:num)', 'Admin\VendorService::detail/$1');
		});
		// admin/vendors/leve
		$routes->group('level', function ($routes) {
			$routes->add('/', 'Admin\VendorLevel::index');
			$routes->add('add', 'Admin\VendorLevel::add');
			$routes->add('save', 'Admin\VendorLevel::save');
			$routes->add('edit/(:num)', 'Admin\VendorLevel::edit/$1');
			$routes->add('update/(:num)', 'Admin\VendorLevel::update/$1');
			$routes->add('detail/(:num)', 'Admin\VendorLevel::detail/$1');
		});
	});
	// $routes->add('permissions', 'Admin\User::userPermission');
});


// routes for vendor
$routes->group('/vendors', function ($routes) {
	$routes->add('/', 'Vendors\Dashboard::index', ['filter' => 'role:Admin,Vendor']);
	// vendors/myvendor
	$routes->group('myvendor', function ($routes) {
		$routes->add('/', 'Vendors\MyVendor::index');
		$routes->group('service', function ($routes) {
			$routes->add('/', 'Vendors\MyVendor::service');
			$routes->add('add', 'Vendors\MyVendor::addservice');
		});
		
	});
	//vendors/products
	$routes->group('products', function ($routes) {
		$routes->add('/', 'Vendors\Product::index');
		$routes->add('add', 'Vendors\Product::add');
		$routes->add('save', 'Vendors\Product::save');
		$routes->add('edit', 'Vendors\Product::edit');
		$routes->add('detail/(:num)', 'Vendors\Product::detail/$1');
		$routes->group('category', function ($routes) {
			$routes->add('/', 'Vendors\ProductCategory::index');
		});
	});
});

// Routes for user
$routes->group('/user', function ($routes) {
	$routes->group('profile', function ($routes) {
		$routes->add('/(:num)', 'User::index/$1');
		$routes->add('vendor/(:num)', 'User::vendor/$1');
	});
});


$routes->delete('admin/users/roles/(:num)', 'Admin\UserRole::delete/$1');
$routes->delete('admin/vendors/services/(:num)', 'Admin\VendorService::delete/$1');
$routes->delete('admin/vendors/level/(:num)', 'Admin\VendorLevel::delete/$1');

$routes->delete('vendors/products/(:num)', 'Vendors\Product::delete/$1');
$routes->delete('users/profile', 'User::profile');

$routes->group('admin/vendors/services', function ($routes) {
	$routes->add('', 'Admin\VendorService::show');
});

$routes->group('admin/products/categories', function ($routes) {
	$routes->add('', 'Admin\ProductCategory::show');
});

/**
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
