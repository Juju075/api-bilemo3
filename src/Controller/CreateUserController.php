<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Ajouter un nouvel utilisateur lié à un client :bundel sensio autogere
 */
class CreateUserController extends AbstractController
{
    /**
     * Create new user  {user_id}
     * @Route("/api/client/{id}/user", name="create_user")
     * @param Client $data
     * @return void
     */ 
    public function __invoke(Client $data): client //tente d'appeler un objet comme une fonction.
    {
    //il envoit un client {id} qui contient les datas du nouveaux user associe.
        //$user = json >> obj (Json deserialise Array > Obj )
        //
        //dd($data);
        $user = null;
        $this->$data->addUser($user);
        
        return $data;
    }
}
