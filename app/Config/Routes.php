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


$routes->group('search', function ($routes) {
	$routes->add('', 'Search::index');
	$routes->add('result', 'Search::result');
});

$routes->post('users/edit/address', 'User::editAddress');

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
	// admin products
	$routes->group('products', function ($routes) {
		$routes->add('/', 'Admin\Product::index');
		$routes->add('detail/(:any)', 'Admin\Product::detail/$1');
	});
});

// routes for vendor
$routes->group('vendors', function ($routes) {
	$routes->add('/', 'Vendors\Dashboard::index', ['filter' => 'role:Admin,Vendor']);
	// vendors/myvendor
	$routes->group('myvendor', function ($routes) {
		$routes->add('/', 'Vendors\MyVendor::index');
		$routes->add('edit', 'Vendors\MyVendor::edit');
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
		$routes->add('edit/(:any)', 'Vendors\Product::edit/$1');
		$routes->add('update/(:any)', 'Vendors\Product::update/$1');
		$routes->add('detail/(:any)', 'Vendors\Product::detail/$1');
		$routes->group('category', function ($routes) {
			$routes->add('/', 'Vendors\ProductCategory::index');
		});
	});

	$routes->group('transaction', function ($routes) {
		$routes->add('/', 'Transaction\Order::index');
		$routes->add('report', 'Transaction\Order::report_view');
		$routes->add('report/(:any)/(:any)', 'Transaction\Order::report_pdf/$1/$2');
		$routes->add('confirm/(:any)', 'Transaction\Order::confirm/$1');
		$routes->add('accept/(:num)', 'Transaction\Order::accept/$1');
		$routes->add('reject', 'Transaction\Order::reject');
	});
});



// Routes for user
$routes->group('/user', function ($routes) {
	$routes->group('profile', function ($routes) {
		$routes->add('/(:num)', 'User::index/$1');
		$routes->add('vendor/(:num)', 'User::vendor/$1');
	});
});

$routes->group('/', function ($routes) {
	$routes->add('', 'Main::index');
	$routes->add('addvendor', 'Main::addVendor');
	$routes->add('vendor/register', 'Main::vendorRegister');
	$routes->add('vendor/products', 'Main::vendorProduct');
	$routes->add('vendor/(:any)', 'Main::vendor/$1');
	$routes->add('cart', 'Main::cart');
	$routes->add('mustlogin', 'Main::mustlogin');
	$routes->add('checkout', 'Main::checkout');
	$routes->add('order/', 'Main::order');
	$routes->add('order/history', 'Main::orderHistory');
	$routes->add('order/finish', 'Main::orderFinish');
	$routes->add('order/process/(:any)', 'Main::orderProcess/$1');
	$routes->add('order/(:any)', 'Main::detailOrder/$1');
	$routes->add('products/services/(:any)', 'Main::productByService/$1');
	$routes->add('(:any)', 'Main::productDetail/$1');
});

$routes->delete('admin/users/roles/(:num)', 'Admin\UserRole::delete/$1');
$routes->delete('admin/vendors/services/(:num)', 'Admin\VendorService::delete/$1');
$routes->delete('admin/vendors/level/(:num)', 'Admin\VendorLevel::delete/$1');
$routes->delete('admin/products/(:num)', 'Admin\Product::delete/$1');

$routes->delete('vendors/products/(:num)', 'Vendors\Product::delete/$1');
$routes->delete('users/profile', 'User::profile');

$routes->group('admin/vendors/services', function ($routes) {
	$routes->add('', 'Admin\VendorService::show');
});

$routes->group('admin/products/categories', function ($routes) {
	$routes->add('', 'Admin\ProductCategory::show');
});

$routes->get('admin/transaction', 'Admin\Transaction::index');
$routes->get('admin/transaction/report', 'Admin\Transaction::report_view');
$routes->post('admin/transaction/report', 'Admin\Transaction::report_view');
$routes->get('admin/transaction/report/(:any)/(:any)', 'Admin\Transaction::report_pdf/$1/$2');
$routes->get('admin/transaction/detail/(:any)', 'Admin\Transaction::detail/$1');

// Cart Routes
$routes->get('cart/item/get', 'Cart::getJsonItemInUserCart');
$routes->get('cart/item/get/group_by_vendor', 'Cart::getJsonItemGroupByVendor');
$routes->get('cart/item/get/group_by_vendor/checkout', 'Cart::getJsonItemGroupByVendor/true');
$routes->delete('cart/item/delete/(:num)', 'Cart::deleteItemInCart/$1');
$routes->post('cart/item/(:any)/process_into_transaction/(:num)', 'Cart::updateProcessItemIntoTransaction/$1/$2');
$routes->post('cart/item/add/(:num)', 'Cart::addItemToCart/$1');
$routes->post('/buy/(:num)', 'Cart::buyNow/$1');
// Notification Routes
$routes->get('notification/item/get', 'notification::getJsonItemInUserNotification');
$routes->post('notification/handling', 'Notification::handling');
// Checkout Routes
$routes->post('checkout/order', 'Transaction\Order::insertTransaction');

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
