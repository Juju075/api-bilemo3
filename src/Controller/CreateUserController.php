<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\User;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Serializer;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CreateUserController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    // Verifiction autorisation (Client {id})  @isGranted  en Annotation
    // Doit etre connecte  | isgranted client ok + Client correspond au {id} envoye.
    //  @ Security("is_granted('ROLE_CLIENT') && client.isIdentical()")  
    //ou applique un Custom Voter (USER_CREATE, data)
    // @Security("is_granted('ROLE_CLIENT'))")

    /**
     * Create new user 
     * 
     * @Route("/api/client/{id}/user", name="app_create_user", methods={"POST"})
     * @param Client $data
     */ 
    public function __invoke(Client $data, Request $request)//tente d'appeler un objet comme une fonction.
    {
        //404 - si $data not found return message json ('this ressource {id} don't exist')
        // Oublie body Json Notice: Undefined index: prenom
        $saisie = json_decode($request->getContent(), true); 
    
        
        $user = (new User())
            ->setPrenom($saisie["prenom"])
            ->setNom($saisie["nom"]);

        //Validation de l'Obj

        $data->addUser($user);
        

        $this->em->persist($user);
        //$this->em->flush();



        return new Response();
            
    }
}
