<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::welcome', ['as' => 'welcome']);
$routes->get('/dashboard', 'Home::index', ['as' => 'dashboard']);

$routes->get('/login', 'Login::index', ['as' => 'login']);
$routes->post('/login', 'Login::processLogin');
$routes->get('/logout', 'Login::logout', ['as' => 'logout']);
