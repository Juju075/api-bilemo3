<?php
declare(strict_types=1);
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UsersFixtures extends Fixture
{

    // get ref client
    // foreach client for random(5,12) users
    public function load(ObjectManager $manager): void
    {
         $faker = Faker\Factory::create('fr_FR');

         //recuperer un [] des clients inscrit. la totalite des reference 
         $clients = [1,2,3,4];
         
         //pour chaque client [4] on cree entre 5 et 12 utilisateurs. foreign key  >>>  client_id dans user
         foreach ($clients as $value) {
             $idClient = $this->getReference('client_'.$clients);
             
            for ($nbUser=0; $nbUser < random_int(3,12); $nbUser++) { 
                $user = (new User())
                ->setClient($idClient)
                ->setPrenom($faker->firstName())
                ->setNom($faker->lastName());
                $manager->persist($user);
            }
         }
         
    }

    public function getDependencies()
    {
        return [
            ClientsFixtures::class
        ];
    }
}
