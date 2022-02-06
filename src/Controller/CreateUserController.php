<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;

use JMS\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function __invoke(Client $data, Request $request, SerializerInterface $serializer, ValidatorInterface $validator): JsonResponse
    {
        //1 - Json > Array (decode)
        $JsonReceived = json_decode($request->getContent(), true); 
        dump($JsonReceived);
    
        // Nouveau   
        //2 - Json > Obj User must be of the type string, array given
        //$user = $serializer->deserialize($JsonReceived, User::class, 'json');
        $user = $serializer->deserialize($request->getContent(), User::class, 'json');
        dump($user);


        // //3 - etape inutile
        // $user = (new User())
        //     ->setPrenom($JsonReceived["prenom"])
        //     ->setNom($JsonReceived["nom"]);

        //3 -
        $data->addUser($user);

        //Nouveau Validation
        //4- Verifie la validité de l’entite avant de persisté.
        $errors = $validator->validate($user);
        dd(count($errors));

        if (count($errors) > 0) {
            //return $this->json($errors, 400); //leve une exeption
            throw new \Exception("Error Processing Request", 400);
            
        }

        $this->em->persist($user);
        //$this->em->flush();

        //Retourne un JsonResponse    
        return new JsonResponse();
            
    }
}

