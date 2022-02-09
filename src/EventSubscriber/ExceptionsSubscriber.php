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



public function onException(ExceptionEvent $event) {

    	$response = new JsonResponse();

        $exception = $event->getThrowable();

        switch ($exception) {
            case $exception instanceof NotFoundHttpException:
                $response->setStatusCode(Response::HTTP_NOT_FOUND);
                $response->setData([
                	'code' => Response::HTTP_NOT_FOUND,
                	'message' => 'Resource not found'
                ]);
                break;
            case $exception instanceof AccessDeniedException:
                $response->setStatusCode(Response::HTTP_FORBIDDEN);
                $response->setData([
                	'code' => Response::HTTP_FORBIDDEN,
                	'message' => 'Forbiden'
                ]);
                break;
            case $exception instanceof InvalidArgumentException:
                $response->setStatusCode($exception->getCode());
                $response->setData($exception->getMessage());
                break;
            default:
                $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
                $response->setData([
                	'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                	'message' => 'Server error'
                ]);
            break;
        }

        $event->setResponse($response);
    }






    // Objectif Renvoyer Model suivant: 
    // {
    //   "code": 404,
    //   "messages": "Message d'erreur."
    // }
    public function onKernelException(ExceptionEvent $event)
    {
        //Exception object from the received event  
        $exception = $event->getThrowable();
        dump($exception);

        //Si code erreur 404 

        //Statuscode
        //Array   403 'Access Denied.' Normalisation getStatusCode()
        $data = ['code: '=>$exception->getCode(), 'message: '=>$exception->getMessage()];

        //Obj exception > Json
        $message = new JsonResponse($data);

        $event->setResponse($message); //Response clasic

    }




    //Symfony events
    public static function getSubscribedEvents() 
    {
        return [
            KernelEvents::EXCEPTION => ['onException', 10],
        ];    
    }    
}

