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
$container->setParameter('debug', strtoupper($_ENV['APP_DEBUG']) === 'TRUE');

// 设置框架初始化
$container->get('plg.database')->setClien($_ENV);

// 运行
$request = Request::createFromGlobals();
$response = $container->get('framework')->handle($request);
return $response;