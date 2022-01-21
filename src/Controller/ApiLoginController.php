<?php

namespace App\Controller;


use App\Entity\Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiLoginController extends AbstractController
{
     /**
      * Recois les credentials 
      * @Route("/api/login", name="api_login", methods={"GET", "POST"})
      * @return Response
      */
    public function index(?Client $client): Response
    {
      if (null === $client) {
         return $this->json([
         'message' => 'missing credentials',
         ], Response::HTTP_UNAUTHORIZED);
      }

       $token = null;

      return $this->json([
         'client'  => $client->getUserIdentifier(),
         'token' => $token,
      ]);
    }
}
