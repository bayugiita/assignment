<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->post('/auth/login', 'AuthController::login');
$routes->post('/auth/verify', 'AuthController::verify');

$routes->get('/', 'StaticPage::home');
$routes->get('/(:segment)', 'StaticPage::view/$1');
