<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/optimize-to-web', 'Home::optimizeToWeb');
$routes->post('/optimize-to-web', 'Home::optimizeToWebPost');

/**
 * Rotas usadas somente no ambiente de desenvolvimento
 * 
 * Motivo: Desenvolvimento das Views
 */
//$routes->environment('development', static function ($routes) {
//    $routes->get('dev', 'Dev::index');
//    $routes->get('dev/optimize-to-web', 'Dev::optimizeToWeb');
//    $routes->post('dev/optimize-to-web', 'Dev::optimizeToWebPost');
//});
