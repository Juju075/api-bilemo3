<?php

namespace App\EventSubscriber;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelEvents;




use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;




class ExceptionsSubscriber implements EventSubscriberInterface
{

    public function onKernelException(ExceptionEvent $event)
    {
        //The original exception    
        $exception = $event->getThrowable();
        
        //Repondre message quel type d'erreur statut code (codes de reponse HTTP)
        $response = new JsonResponse();
        $event->setResponse($response);
    }

    public static function getSubscribedEvents() 
    {
        return [
            KernelEvents::EXCEPTION => ['onKernelException'],
        ];
                
    }    
}