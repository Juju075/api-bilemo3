<?php
declare(strict_types=1);
namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;

class ProduitsFixtures extends Fixture
{

    private array $produits;

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($nbProduit=0; $nbProduit < 25 ; $nbProduit++) { 
        $produit = (new Produit())
        ->setName($faker->realText(100))
        ->setModel($faker->sentence)
        ->setDescription($faker->realTextBetween(160, 200))
        ->setPrice($faker->randomFloat(2, 450, 2000))
        ->setCreatedAt($faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'));
        $manager->persist($produit);

        //ajouter la reference dans une collection
        $this->addReference('produit_'.$nbProduit, $produit);
        }
    $manager->flush();
    //mettre $produits dans une reference addReference('produits')
    }

    public function getDependencies()
    {
        return [
            ClientsFixtures::class,
            UsersFixtures::class
        ];
    }   
}
