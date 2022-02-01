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

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context); //Specification openApi
        dump($openApi);

        //10:03    
        foreach ($openApi->getPaths()->getPaths() as $path) {
            dd($path);
        }

        return $openApi;
    }
}