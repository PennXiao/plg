<?php
use Symfony\Component\HttpFoundation\Request;
// 路由
include __DIR__.'/routes.php';
// 服务器容器
$container = include __DIR__.'/container.php';
// 设置服务器常量
$container->setParameter('debug', DEBUG);
// 获取请求
$request = Request::createFromGlobals();
$response = $container->get('framework')->handle($request);
return $response;