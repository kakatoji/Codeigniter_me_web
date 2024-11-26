<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "Users\Home::index");
$routes->group("", function ($routes) {
  $routes->add("about", "Users\Home::about");
  $routes->add("contak", "Users\Home::contak");
  $routes->add("komik", "Users\Home::komik");
  $routes->add("detail/(:any)", 'Users\Home::detail/$1');
  $routes->add("komik/create", "Users\Home::create");
  $routes->add("komik/save", "Users\Home::save");
  $routes->add("komik/edit/(:segment)", 'Users\Home::edit/$1');
  $routes->add("komik/update/(:segment)", 'Users\Home::update/$1');
  $routes->delete("komik/(:num)", 'Users\Home::hapus/$1');
});

$routes->group("",function($routes){
  $routes->add("orang","Users\Orang::index");
});