<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/login/', 'Auth::login', ['filter' => 'guest']);
$routes->post('/login/', 'Auth::attemptLogin', ['filter' => 'guest']);

$routes->get('/register/', 'Auth::register', ['filter' => 'guest']);
$routes->post('/register/', 'Auth::storeRegister', ['filter' => 'guest']);

$routes->get('/logout/', 'Auth::logout', ['filter' => 'auth']);

$routes->get('/account/', 'Account::index', ['filter' => 'auth']);
$routes->get('/categories/', 'Catalog::categories');
$routes->get('/categories/(:segment)/', 'Catalog::categories/$1');

$routes->get('/anime/(:segment)/', 'Catalog::details/$1');