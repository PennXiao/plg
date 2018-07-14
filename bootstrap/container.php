<?php
use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
use Symfony\Component\EventDispatcher;

use Plg\ResponseString;
// use Plg\ErrorController;
use Plg\Framework;
use Plg\Database;

$containerBuilder = new DependencyInjection\ContainerBuilder();
$containerBuilder->register('plg.database', Database::class);
// $containerBuilder->register('plg.view', Database::class);

#注入框架依赖的类
$containerBuilder->register('controller_resolver', HttpKernel\Controller\ControllerResolver::class);
$containerBuilder->register('request_stack', HttpFoundation\RequestStack::class);
$containerBuilder->register('argument_resolver', HttpKernel\Controller\ArgumentResolver::class);

/**
 * 配置监听事件-钩子。
 */

#重载用户控制器返回对象为字符串
$containerBuilder->register('listener.stringresponse', ResponseString::class);
#重载用户步骤的报错问题
$containerBuilder->register('listener.exception', HttpKernel\EventListener\ExceptionListener::class)
    ->setArguments(array('Plg\ErrorController::exceptionAction'))
;
$containerBuilder->register('listener.response', HttpKernel\EventListener\ResponseListener::class)
    ->setArguments(array('UTF-8'))
;
$containerBuilder->register('context', Routing\RequestContext::class);
$containerBuilder->register('matcher', Routing\Matcher\UrlMatcher::class)
    ->setArguments(array($routes, new Reference('context')))
;
$containerBuilder->register('listener.router', HttpKernel\EventListener\RouterListener::class)
    ->setArguments(array(new Reference('matcher'), new Reference('request_stack')))
;

$containerBuilder->register('dispatcher', EventDispatcher\EventDispatcher::class)
    ->addMethodCall('addSubscriber', array(new Reference('listener.router')))
    ->addMethodCall('addSubscriber', array(new Reference('listener.response')))
    ->addMethodCall('addSubscriber', array(new Reference('listener.exception')))
    ->addMethodCall('addSubscriber', array(new Reference('listener.stringresponse')))
;

//加载框架类
$containerBuilder->register('framework', Framework::class)
    ->setArguments(array(
        new Reference('dispatcher'),
        new Reference('controller_resolver'),
        new Reference('request_stack'),
        new Reference('argument_resolver'),
    ))
;

return $containerBuilder;