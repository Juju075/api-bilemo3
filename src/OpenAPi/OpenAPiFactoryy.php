<?php
declare(strict_types = 1); 
namespace App\OpenAPi;

use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;


class OpenApiFactory implements OpenApiFactoryInterface

{
    private $decorated;

    //On doit modifier services.yaml pour overider le Factory par defaut   
    public function __construct(OpenApiFactoryInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    /**
     * Vas permettre de retire proprement une operation marqué hidden.
     *
     * @param array $context
     * @return OpenApi
     */
    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context); //Specification openApi

        //Astuce pour retirer les operations POST "hidden"   
        //9:19 Parcours l'ensemble des chemins de $openApi Objectif retirer une operation hidden en la passant en null.   
        foreach ($openApi->getPaths()->getPaths() as $key =>$path) {

            if ($path->getPost() && $path->getPost()->getSummary() == "hidden") { //Selection
                $openApi->getPaths()->addPath($key, $path->withPost(null)); //Remplace hidden par null.
            }
         
        }

        return $openApi;
    }
}