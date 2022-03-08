<?php
declare(strict_types = 1);
namespace App\Controller;

use App\Entity\Client;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;

class GetUsersCollectionController extends AbstractController
{
    /**
     * @Route("/api/client/{id}/users", methods={"GET"})
     */
    public function __invoke(Client $client, SerializerInterface $serializer): Response
    {
        $users = $client->getUsers(); //Block User::products 

        $response = $serializer->serialize($users, 'json');


        // INSERT PAGINATION

        //old    
        $adapter = new ArrayAdapter([]);
        $pagerfanta = new Pagerfanta($adapter);
        //

        $adapter = new NullAdapter(100);
        $pagerfanta = Pagerfanta::createForCurrentPageWithMaxPerPage($adapter, 2, 5);

        // This will the return 5 items from the second page of the paginated list
        $currentPageResults = $pagerfanta->getCurrentPageResults();

        // FIN INSERT PAGINATION


        return new Response($response,Response::HTTP_OK,
        ['content-type' => 'application/json']
        );
    }

    //Pagination  (PagerFanta)  - https://openclassrooms.com/fr/courses/4087036-construisez-une-api-rest-avec-symfony/4323221-tutoriel-paginez-une-liste-de-ressources
    //babdev/pagerfanta-bundle  - https://www.babdev.com/open-source/packages/pagerfanta/docs/3.x/intro
    //AutoDecouvrable (Hateoas) - https://openclassrooms.com/fr/courses/4087036-construisez-une-api-rest-avec-symfony/4343816-rendez-votre-api-auto-decouvrable-dernier-niveau-du-modele-de-maturite-de-richardson




}
