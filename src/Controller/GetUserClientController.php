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
     * @Route("/api/client/{id}/user/{user_id}", name="app_client_detail_user", methods={"GET"})
     * @Entity("client", expr="repository.find(id)")
     * @Entity("user", expr="repository.find(user_id)")
     */
    public function __invoke(Client $client, User $user, SerializerInterface $serializer): Response
    {

        //if throw Exception On verifie si l'user existe dans la liste de ce client.
        if (! $client->getUsers()->contains($user)) {
            throw $this->createAccessDeniedException();
        }

        $response = $serializer->serialize($user, 'json');
        // trop d'infos suivi des fk "users" et "products" @Groups "client_collection_read"
        return new Response($response,Response::HTTP_OK,
        ['content-type' => 'application/json']
        );

    }
}

