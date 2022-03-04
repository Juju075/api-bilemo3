<?php
declare(strict_types = 1); 
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

        //if throw Exception On verifie si l'user existe dans la liste de ce client.
        if (! $client->getUsers()->contains($user)) {
            throw $this->createAccessDeniedException();
        }
        //JsonContent
        $response = $serializer->serialize($user, 'json');// Error strpos() expects parameter 1 to be string, array given (500 Internal Server Error)

        //Array
        return new Response($response,Response::HTTP_OK,
        ['content-type' => 'application/json']
        );

    }
}

