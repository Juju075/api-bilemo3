<?php
declare(strict_types = 1); 
namespace App\Controller;

use App\Entity\Client;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DeleteClientController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/api/client/{id}/users", methods={"DELETE"})
     */
    public function __invoke(Client $data): JsonResponse
    {
        $userLogged = ($this->getUser())
            ->getUserIdentifier();

        if ($userLogged === $data->getUserIdentifier()) {
            $this->em->remove($data);
            $this->em->flush();
        }

        $response = ['client'=> $data->getId(), 'à ete supprime'];
        return new JsonResponse($response);

    }
}