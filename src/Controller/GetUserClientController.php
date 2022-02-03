<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetUserClientController extends AbstractController
{
    /**
     * @Route("/api/client/{id}/user/{user_id}", methods={"GET"})
     * @Entity("client", expr="repository.find(id)")
     * @Entity("user", expr="repository.find(user_id)")
     */
    public function __invoke(Client $client, User $user, SerializerInterface $serializer): Response
    {
        //Gestion d'erreur.
        //404 throw exeption si user n'existe pas dans la list

        $userSerialized = $serializer->serialize($user, 'json');
        $response = new Response($userSerialized);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}

