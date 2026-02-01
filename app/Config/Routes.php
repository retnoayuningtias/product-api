<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', function($routes) {
    $routes->get('products', 'Api\ProductController::index');
    $routes->post('products', 'Api\ProductController::store');
    $routes->put('products/(:num)', 'Api\ProductController::update/$1');
    $routes->patch('products/(:num)', 'Api\ProductController::update/$1');
    $routes->delete('products/(:num)', 'Api\ProductController::delete/$1');
    $routes->get('products/trash', 'Api\ProductController::trash');
    $routes->post('products/(:num)/restore', 'Api\ProductController::restore/$1');
    $routes->delete('products/(:num)/force', 'Api\ProductController::forceDelete/$1');
});
