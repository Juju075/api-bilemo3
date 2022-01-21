<?php
declare(strict_types = 1); 
namespace App\Controller;

use App\Entity\Produit;
use App\Handler\ProduitPublishingHandler;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

//Sur call de controlleur

#[AsController]
class CreateProduit extends AbstractController
{

    //Creer un nouveau produit au niveau de l'entite qui fait appel a cette fonction. (itemOperation > controller)
    //Entity  itemOperation "put" | "method"/ post, "path"/ iri, "controller"/ CreateProduit::class,
    
    private $produitPublishingHandler;

    /**
     * Undocumented function
     *
     * @param ProduitPublishingHandler $produitPublishingHandler
     */
    public function __construct(ProduitPublishingHandler $produitPublishingHandler)
    {
        $this->produitPublishingHandler = $produitPublishingHandler;
    }

    /**
     * Undocumented function
     *
     * @param Produit $data
     * @return Produit
     */    
    public function __invoke(Produit $data): Produit //tente d'appeler un objet comme une fonction.
    {

        //recuperer le json et l'hydrater
        //id et datetime autogenere
        //tous les champs son non null (obligatoire) name model description price 
        dd($data);
        $this->produitPublishingHandler->handle($data);
        return $data;
    }
}