<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Dotenv\Dotenv;


//配置文件
$dotenv = new Dotenv();
$dotenv->load(BASEDIR_.'/.env');

// 路由实例化
$routes = include __DIR__.'/routes.php';

// 服务器容器
$container = include __DIR__.'/container.php';
// 设置服务器容器常量
$container->setParameter('debug', getenv('APP_DEBUG'));

// 设置框架初始化
$container->get('plg.database')->setClien();

// 运行
$request = Request::createFromGlobals();
$response = $container->get('framework')->handle($request);
return $response;