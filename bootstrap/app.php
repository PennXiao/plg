<?php
// example.com/src/app.php
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/Home/{numb}', array(
    'numb' => null,
    '_controller' => '\App\HomeController::indexAction',
)));

return $routes;
