<?php
use Symfony\Component\Routing\Route;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
 
// look inside *this* directory 锁定“这个”目录来查找
$locator = new FileLocator(array(BASEDIR_.'/config'));
$loader = new YamlFileLoader($locator);
$routes = $loader->load('routes.yml');

//如果不存在路由则
$routes->add('master', new Route('/',
    array(
        '_controller' => '\App\Controller\HomeController::home',
    )
)); 
// use Symfony\Component\Routing\RouteCollection;
// use Symfony\Component\Routing\Route;

// $routes = new RouteCollection();
// $routes->add('master', new Route('/',
//     array(
//         '_controller' => '\App\Controller\HomeController::index',
//     )
// )); 

return $routes;