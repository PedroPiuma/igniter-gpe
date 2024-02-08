<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::welcome', ['as' => 'welcome']);

$routes->get('/login', 'LoginController::index', ['as' => 'login']);
$routes->post('/login', 'LoginController::processLogin');
$routes->get('/logout', 'LoginController::logout', ['as' => 'logout']);

$routes->get('/dashboard', 'AdminController::index', ['as' => 'dashboard']);

$routes->get('/users', 'UsuarioController::index', ['as' => 'users.index']);
$routes->get('/users/create', 'UsuarioController::create', ['as' => 'users.create']);

$routes->get('/payment-reports', 'PaymentController::gerarArquivoConciliacaoPixAction', ['as' => 'payment-reports']);
$routes->get('/payment/criar-pix-avulso', 'PaymentController::createPix', ['as' => 'payment.create-pix']);

$routes->get('/adquirentes/index', 'AdquirenteController::index', ['as' => 'adquirentes.index']);

$routes->get('/bandeiras/index', 'BandeiraController::index', ['as' => 'bandeiras.index']);
