<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\UserRepository;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\SerializationContext;
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
        $collectionUsers = $userRepository->findBy(['client'=>$client->getId()]); //id prenom nom 
    //     dd($collectionUsers);

    //     $response = $serializer->serialize($collectionUsers, 'json', SerializationContext::create()->setGroups(['client_collection_read']));
    //     //groups uniquement id prenom nom create at 
    //    $json = preg_replace('!\\r?\\n!', "", $response);

        return new JsonResponse($collectionUsers); //Need array
    }
}
