<?php
declare(strict_types = 1); 
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
    public function index(?Client $client)
    {
     //..
    }
}

