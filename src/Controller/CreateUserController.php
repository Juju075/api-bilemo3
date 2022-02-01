<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CreateUserController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em =$em;
    }

    // Verifiction autorisation (Client {id})  @isGranted  en Annotation
    // Doit etre connecte  | isgranted client ok + Client correspond au {id} envoye.
    //  @ Security("is_granted('ROLE_CLIENT') && client.isIdentical()")  + custom Voter

    /**
     * Create new user 
     * 
     * @Route("/api/client/{id}/user", name="app_create_user", methods={"POST"})
     * @Security("is_granted('ROLE_CLIENT')")
     * @param Client $data
     * @return void
     */ 
    public function __invoke(Client $data, Request $request, UserRepository $userRepo, EntityManagerInterface $em): Client //tente d'appeler un objet comme une fonction.
    {
        //404 - si $data not found return message json ('this ressource {id} don't exist')
        // Oublie body Json Notice: Undefined index: prenom

        $saisie = json_decode($request->getContent(), true); 
        
        //: Undefined property: Symfony\Component\HttpKernel\Event\ViewEvent::$getControllerResult
        //
        $exist = $userRepo->findOneBy(['id'=>$data->getId(), 'prenom'=>$saisie["prenom"], 'nom'=>$saisie["nom"]]);
        dump($exist);

        //Event UserNoDuplicateSubscriber (Contrainte)

        $user = (new User())
            ->setPrenom($saisie["prenom"])
            ->setNom($saisie["nom"]);

        $data->addUser($user);

        $em->persist($user);
        $em->flush();

        //[event] Subscriber: noDuplicateUser (Kernel.controller)
        //persist & flush


        //sinon exeption json

        return $data;
            
    }
}
