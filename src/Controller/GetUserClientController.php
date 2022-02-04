<?php

namespace App\Controller;

use App\Entity\User;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GetUserClientController extends AbstractController
{
    /**
     * @Route("/api/client/{id}/user/{user_id}", methods={"GET"})
     * @Entity("client", expr="repository.find(id)")
     * @Entity("user", expr="repository.find(user_id)")
     */
    public function __invoke(User $user, SerializerInterface $serializer, ValidatorInterface $validator): JsonResponse
    {

        //Nouveau   
        //Erreur {user_id}    
        $errors = $validator->validate($user);
        dump($errors);

        if (count($errors) > 0) {
            //return $this->json($errors, 400); //leve une exeption
            throw new \Exception("Error Processing Request", 1);
            
        }

        $userSerialized = $serializer->serialize($user, 'json');

        //$response = new Response($userSerialized);
        //$response->headers->set('Content-Type', 'application/json');

        $response = new JsonResponse($userSerialized, 200, []);
        return $response;
    }
}

