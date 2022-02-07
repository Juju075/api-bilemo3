<?php
declare(strict_types = 1); 
namespace App\EventSubscriber;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelEvents;




use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\serializer;


// Option 1 : écouter les évènements lancés par JMSSerializer (Serialisation).
// Option 2 : écouter l'évènement  kernel.exception

class ExceptionsSubscriber implements EventSubscriberInterface
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    // Objectif Renvoyer Model suivant: 
    // {
    //   "code": 404,
    //   "messages": "Message d'erreur."
    // }
    public function onKernelException(ExceptionEvent $event): JsonResponse
    {
        //Exception object from the received event  
        $exception = $event->getThrowable();
        dump($exception);

        //Si code erreur 404 

        //Statuscode
        //Array   403 'Access Denied.' Normalisation getStatusCode()
        $data = ['code: '=>$exception->getCode(), 'message: '=>$exception->getMessage()];

        //Obj exception > Json
        $message = $this->serializer->serialize($data, 'json');

        // Response object to display the exception details
        $response = new JsonResponse($message);
        return $response;
    }




    //Symfony events
    public static function getSubscribedEvents() 
    {
        return [
            KernelEvents::EXCEPTION => ['onKernelException', 10],
        ];    
    }    
}

