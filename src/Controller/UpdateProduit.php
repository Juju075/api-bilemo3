<?php
declare(strict_types = 1); 
namespace App\Controller;

use App\Entity\Produit;
use Symfony\Component\HttpKernel\Attribute\AsController;

//Sur call de controlleur

#[AsController]
class UpdateProduit
{
    /**
     * Undocumented function
     *
     * @param Produit $data
     * @return Produit
     */
    public function __invoke(Produit $data): Produit
    {
        dd($data);
        return $data;

    }
}