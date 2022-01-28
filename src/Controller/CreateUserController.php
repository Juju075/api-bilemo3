<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\User;
use App\Repository\UserRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class CreateUserController extends AbstractController
{

    // Verifiction autorisation (Client {id})  @isGranted  en Annotation
    // Doit etre connecte  | 1-Recuperer le token 2-Le comparer 3-l'Autorise
    //     
    /**
     * Create new user  {user_id}
     * 
     * @Security("is_granted('ROLE_CLIENT') && client.isVerified()")
     * @Route("/api/client/{id}/user", name="app_create_user", methods={"POST"})
     * @param Client $data
     * @return void
     */ 
    public function __invoke(Client $data, Request $request, UserRepository $userRepo): Client //tente d'appeler un objet comme une fonction.
    {

        dump($request); // client id 295

        

        //recuperer le json dans le body key
        $prenom = null;
        $nom = null;

        // $user = (new User())
        //     ->setPrenom($prenom)
        //     ->setNom($nom);

        //$data->addUser($user);



        // //Code HTTp 200 401 403 504

        // // Verification Json Valide sinon trow exeption Deserialisation - Json en Obj (User)
        // $user = null;
        
        // // Verification - Requete sql where client_id + prenom + nom si non trouve ok on continue.|| Ajouter les contrainte en annotation Constraint @Assert
        // $dataId= null;
        // $prenom =null;
        // $nom=null;

        // $userExist = $userRepo->findOneBy(["client_id"=>$dataId, "prenom"=>$prenom, "nom"=>$nom]);

        // if (empty($userExist)) {
        //     $this->$data->addUser($user);
        //     return $data;
        // }else{
        //     //Message en Json 'This user already exist'

        // }

        return $data;
            
    }
}
