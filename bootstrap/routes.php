<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('master', new Route('/',
    array(
        '_controller' => '\App\Controller\HomeController::index',
    )
));

// ...

return $routes;