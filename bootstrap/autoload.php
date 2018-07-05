<?php
use Symfony\Component\HttpFoundation\Request;

$routes = include __DIR__.'/app.php';
$container = include __DIR__.'/container.php';

$request = Request::createFromGlobals();

$response = $container->get('framework')->handle($request);

$response->send();