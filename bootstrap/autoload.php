<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;

include __DIR__.'/routes.php';

$container = include __DIR__.'/container.php';

// 设置debug
$container->setParameter('debug', DEBUG);

// 设置详情，编码
$container->register('listener.response', HttpKernel\EventListener\ResponseListener::class)->setArguments(array('%charset%'));
$container->setParameter('charset', 'UTF-8');

// 控制路由中间件
// $container->register('matcher', Routing\Matcher\UrlMatcher::class)->setArguments(array('%routes%', new Reference('context')));
// $container->setParameter('routes', include __DIR__.'/routes.php');

$request = Request::createFromGlobals();
$response = $container->get('framework')->handle($request);
return $response;