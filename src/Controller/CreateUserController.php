<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;

use JMS\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;
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
     *
     * @param Client $data
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param ValidatorInterface $validator
     * @return JsonResponse
     */ 
    public function __invoke(Client $data, Request $request, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        //Si le format du JSON n'est pas correct, renvoyer une erreur avec le message d'exception. 
        //404 - si $data not found return message json ('this ressource {id} don't exist')
        // Oublie body Json Notice: Undefined index: prenom

        //1 - Json recu
        $JsonReceived = json_decode($request->getContent(), true); 
    
        // Nouveau   
        //2 - Deserialisation > Obj  utilise addUser de client?
        $user = $serializer->deserialize($JsonReceived, User::class, 'json');
        dump($user);


        //3 - Add newUser    
        $user = (new User())
            ->setPrenom($JsonReceived["prenom"])
            ->setNom($JsonReceived["nom"]);
        $data->addUser($user);

        //Nouveau
        //4- Verifie la vlaidite de l’entite avant de persisté.
        $errors = $validator->validate($user);
        dump($errors);

        if (count($errors) > 0) {
            //return $this->json($errors, 400); //leve une exeption
            throw new \Exception("Error Processing Request", 1);
            
        }

        $this->em->persist($user);
        //$this->em->flush();

        //Retourne un JsonResponse    
        return new Response();
            
    }
}



