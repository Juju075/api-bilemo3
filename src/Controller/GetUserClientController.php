<?php
declare(strict_types = 1); 
namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetUserClientController extends AbstractController
{
    /**
     * @Route("/api/client/{id}/user/{user_id}", methods={"GET"})
     * @Entity("client", expr="repository.find(id)")
     * @Entity("user", expr="repository.find(user_id)")
     */
    public function __invoke(Request $request, UserRepository $userRepo, SerializerInterface $serializer): JsonResponse
    {
        //Afficher Obj User > Json
        //via un queryBuilder
        $detailUser = $userRepo->findOneByQueryBuilder($request->get('id'), $request->get('user_id'));
        dd($detailUser);


        //si non trouve





        //serialiser
        $var = $serializer->serialize($detailUser, 'json');

        return new JsonResponse();

    }
}

