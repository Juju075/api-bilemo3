<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\UserRepository;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetUsersCollectionController extends AbstractController
{
    /**
     * @Route("/api/client/{id}/users", methods={"GET"})
     */
    public function __invoke(Client $client, UserRepository $userRepository, SerializerInterface $serializer): JsonResponse
    {

        // client_id
        $response = $userRepository->findBy(['client'=>$client->getId()]); //Ne pas afficher password
        $response->serialize();
    

        return new JsonResponse($response);
        // return new Response($response,Response::HTTP_OK,  // User::class
        // ['content-type' => 'application/json']
        // );
    }
}
