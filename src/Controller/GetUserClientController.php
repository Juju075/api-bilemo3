<?php
declare(strict_types = 1); 
namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;
use App\Repository\UserRepository;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\UidNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Component\Validator\Validator\ValidatorInterface;
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

        //exit
        if (! $client->getUsers()->contains($user)) {
            throw $this->createAccessDeniedException();
        }

        //serialiser
        $response =  $serializer->serialize($user, 'json');

        //Array
        return new Response($response,Response::HTTP_OK,  
    ['content-type' => 'application/json']
);

    }
}

