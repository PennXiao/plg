<?php
namespace Plg;
 
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpFoundation\Response;
class ResponseString implements EventSubscriberInterface
{
    public function onView(GetResponseForControllerResultEvent $event)
    {
        $response = $event->getControllerResult();

        if ( strtoupper($_ENV['APP_DEBUG']) === 'TRUE' ) {
            $str = '<script type="text/javascript">'."console.log('%c----------Debug-start----------\\n--This Load had spend memory:".((memory_get_usage() - F_S_MEMORY)/1024).' (kb).\n--This Load had spend microtime:'.(microtime(true) - F_S_TIME)." (s).\\n----------Debug---end-------------','color:red');</script>";
            $response .= $str;
        }

        if (is_string($response)) {
            $event->setResponse(new Response($response));
        }
    }
 
    public static function getSubscribedEvents()
    {
        return array('kernel.view' => 'onView');
    }
}