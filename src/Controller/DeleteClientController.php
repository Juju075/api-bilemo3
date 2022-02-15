<?php
declare(strict_types = 1); 
namespace App\Controller;

use App\Entity\Client;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DeleteClientController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {}

    /**
     * Delete Client requested.
     *
     * @param Client $data
     * @return JsonResponse
     */    
    public function __invoke(Client $data): JsonResponse
    {
        $userLogged = ($this->getUser())
            ->getUserIdentifier();

        if ($userLogged === $data->getUserIdentifier()) {
            $this->em->remove($data);
        }

        $response = ['client'=>$data, 'à ete supprime'=>'']; // client id à ete supprimé.
        return new JsonResponse($response);

    }
}