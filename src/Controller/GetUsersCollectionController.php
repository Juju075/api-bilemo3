<?php
declare(strict_types = 1);
namespace App\Controller;

use App\Entity\Client;



use App\Repository\UserRepository;
use JMS\Serializer\SerializerInterface;


use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetUsersCollectionController extends AbstractController
{


    /**
     * @Route("/api/client/{id}/users", name="app_client_users", methods={"GET"})
     */
    public function __invoke(Client $client, SerializerInterface $serializer, UserRepository $UserRepository): Response
    {
        $pager = $UserRepository->search($client->getId()); //Erreur ici
        $response = $serializer->serialize($pager, 'json', SerializationContext::create()->setGroups(array('client_collection_read')));


        //return new User($pager);
        //return $pager->getCurrentPageResults();

        return new Response($response,Response::HTTP_OK,
        ['content-type' => 'application/json']
        );
    }
}


