<?php
namespace Plg;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Debug\Exception\FlattenException;
 
class ErrorController
{
    public function exceptionAction(FlattenException $exception)
    {
        $msg = '看，代码写错了吧 <pre>'.$exception->getMessage().'</pre> -^.^';
        return new Response($msg, $exception->getStatusCode());
    }
}