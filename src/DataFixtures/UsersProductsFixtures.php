<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UsersProductsFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {   
        //chaque user a 0 et 3 produits
        $faker = Faker\Factory::create('fr_FR');
        $clients  = [0,1,2,3];       

        foreach ($clients as $client) { 

            for ($nbUser=0; $nbUser <4 ; $nbUser++) { 
                $user = $this->getReference('user_'.$client.'_'.$nbUser);
                $nbRandom = rand(0, 25);
                $produit = $this->getReference('produit_'.$nbRandom);
                $user->addProduct($produit);
                $manager->persist($produit);
            }
        $manager->flush();
        }
    }

    public function getDependencies()
    {
        return [
            ClientsFixtures::class,
            UsersFixtures::class,
            ProduitsFixtures::class
        ];
    }
}
