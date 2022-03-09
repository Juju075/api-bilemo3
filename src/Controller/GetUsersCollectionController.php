<?php
declare(strict_types = 1);
namespace App\Controller;

use App\Entity\Client;

use Pagerfanta\Pagerfanta;

use App\Repository\UserRepository;
use JMS\Serializer\SerializerInterface;

use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use JMS\Serializer\Annotation\Type;

class GetUsersCollectionController extends AbstractController
{
    /**
     * @Type("array<App\Entity\User>")
     */
    public $data;
    public $meta;

    public function __construct(Pagerfanta $data) //Cannot autowire service $data
    {
        $this->data = $data;
        
        //Modification de $data.
        //C ca la pagination affiche.
        // $this->addMeta('limit', $data->getMaxPerPage());
        // $this->addMeta('current_items', count($data->getCurrentPageResults()));
        // $this->addMeta('total_items', $data->getNbResults());
        // $this->addMeta('offset', $data->getCurrentPageOffsetStart());
    }

    /**
     * @Route("/api/client/{id}/users", name="app_client_users", methods={"GET"})
     */
    public function __invoke(Client $client, SerializerInterface $serializer, UserRepository $UserRepository): Response
    {
        //C le Pager
        $users = $UserRepository->search($client->getId()); //Erreur ici

        $response = $serializer->serialize($users, 'json', SerializationContext::create()->setGroups(array('client_collection_read')));

        return new Response($response,Response::HTTP_OK,
        ['content-type' => 'application/json']
        );
    }


    //Ajout d'une metadonnee.
    public function addMeta($name, $value)
    {
        if (isset($this->meta[$name])) {
            throw new \LogicException(sprintf('This meta already exists. You are trying to override this meta, use the setMeta method instead for the %s meta.', $name));
        }
        
        $this->setMeta($name, $value);
    }

    //Setter
    public function setMeta($name, $value)
    {
        $this->meta[$name] = $value;
    }
}


