<?php

namespace App\Controller;


use App\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ApiLoginController extends AbstractController
{

   //Your controller creates the correct response:

   /**
   * Recois les credentials 
   * @Route("/api/login", name="api_login", methods={"POST"})
   * @param Client|null $client
   * @param Request $request
   * @return JsonResponse
   */  
    public function index(?Client $client, Request $request): JsonResponse
    {
      if (null === $client) {
         return $this->json([
         'message' => 'missing credentials',
         ], Response::HTTP_UNAUTHORIZED);
      }
      dd($request);
       //recuperer le API token genere normalement c dans la Request  
       $token = null; // somehow create an API token for $user


      return $this->json([
         'client'  => $client->getUserIdentifier(),
         'token' => $token,
      ]);
    }
}

