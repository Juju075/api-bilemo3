<?php

namespace App\EventSubscriber;
use App\Entity\Client;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class PassewordEncoderSubscriber implements EventSubscriberInterface
{
private $encoder;

    //besoin service encoder

    /**
     * Encoder service
     *
     * @param UserPasswordHasherInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Encode the password used to authenticate the client.
     *
     * @param ViewEvent $event
     * @return void
     */
    public function encodePassword(ViewEvent $event) //Kernel event 
    {
        $controllerResult = $event->getControllerResult; //on capte le resultat du controller 
        $method = $event->getRequest()->getMethod(); //method 

        if ($controllerResult instanceof Client && $method === "POST") {
           $hash = $this->encoder->encodePassword($controllerResult, $controllerResult->getPassword()); //Returns the password used to authenticate the user.
           $controllerResult->setPassword($hash);
        }
    }

    //en hass avant l'insertion
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['encodePassword', EventPriorities::PRE_WRITE],
        ];
        
    }
}
