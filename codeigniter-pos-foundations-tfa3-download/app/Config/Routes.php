<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

$routes->get('/', 'Pages::home');
$routes->get('about', 'Pages::about');
$routes->get('customers', 'Customers::index');
$routes->get('customers/new', 'Customers::createForm');
$routes->post('customers/create', 'Customers::create');
$routes->get('customers/(:num)/edit', 'Customers::edit/$1');
$routes->post('customers/(:num)/update', 'Customers::update/$1');
$routes->get('users', 'Users::index');
$routes->get('users/new', 'Users::createForm');
$routes->post('users/create', 'Users::create');
$routes->get('users/(:num)/edit', 'Users::edit/$1');
$routes->post('users/(:num)/update', 'Users::update/$1');
