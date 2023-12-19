<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->get('/', 'Main::index');
$routes->get('admin', 'Admin::dashboard');
$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('admin/dashboard', 'Admin::dashboard');
});
