<?php

namespace App\EventSubscriber;

use App\Entity\User;
use App\Repository\UserRepository;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;

use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class UserNoDuplicateSubscriber implements EventSubscriberInterface
{

    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    /**
     * Check if fullName already exist 
     *
     * @param ViewEvent $event
     * @return void
     */
    public function verifCombinaison(ViewEvent $event)
    {
        $controllerResult = $event->getControllerResult; 
        dump($controllerResult);
        $method = $event->getRequest()->getMethod(); 

        if ($controllerResult instanceof User && $method === "POST") {
            
            $clientId = null;
            $prenom = null;
            $nom = null ;
    
          $exist = $userRepo->findOneBy(['client_id'=>$clientId, 'prenom'=>$prenom, 'nom'=>$nom]); //prenom et nom
        }


    }

    //Events de ApiPlatform    
    public static function getSubscribedEvents()
    {
        //Allows to create a response for the return value of a controller.
        return [
            KernelEvents::VIEW => ['verifCombinaison', EventPriorities::PRE_WRITE]
        ];
    }
}
