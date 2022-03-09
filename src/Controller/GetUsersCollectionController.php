<?php
declare(strict_types = 1);
namespace App\Controller;

use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\ArrayAdapter;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetUsersCollectionController extends AbstractController
{
    private $em;

    /**
     * @Route("/api/client/{id}/users", name="app_client_users", methods={"GET"})
     */
    public function __invoke(Client $client, SerializerInterface $serializer): Response
    {
        //ClientRepository
        $users = $client->getUsers(); //Block User::products 

        $response = $serializer->serialize($users, 'json');

        return new Response($response,Response::HTTP_OK,
        ['content-type' => 'application/json']
        );
    }

    //Pagination  (PagerFanta)  - https://openclassrooms.com/fr/courses/4087036-construisez-une-api-rest-avec-symfony/4323221-tutoriel-paginez-une-liste-de-ressources
    //babdev/pagerfanta-bundle  - https://www.babdev.com/open-source/packages/pagerfanta/docs/3.x/intro
    //AutoDecouvrable (Hateoas) - https://openclassrooms.com/fr/courses/4087036-construisez-une-api-rest-avec-symfony/4343816-rendez-votre-api-auto-decouvrable-dernier-niveau-du-modele-de-maturite-de-richardson

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/api/programmers")
     * @Method("GET")
     */
    public function listAction(Client $client,Request $request)
    {
        $page = $request->query->get('page', 1);


        //Query builder (entitymanager)

        $qb = $this->em->getRepository('ClientRepositoryPaginate')->findAll(); //findAllQueryBuilder()

        $adapter = new DoctrineORMAdapter($qb);

        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(10);
        $pagerfanta->setCurrentPage($page);

        $programmers = [];

        foreach ($pagerfanta->getCurrentPageResults() as $result) {
            $programmers[] = $result;
        }


        $response = $this->createApiResponse([
            'total' => $pagerfanta->getNbResults(),
            'count' => count($programmers),
            'programmers' => $programmers,
        ], 200);


        return $response;
    }



}


