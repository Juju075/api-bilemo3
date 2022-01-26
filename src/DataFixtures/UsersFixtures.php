<?php
declare(strict_types=1);
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $clients = [0,1,2,3];  

        //Pour chaque client ont cree 4 users
        foreach ($clients as $value) {

            $Objclient = $this->getReference('client_'.$value);
            $clientId = $Objclient->getId();

                for ($nbUser=0; $nbUser < 4; $nbUser++) { 
                    $user = (new User())
                    ->setClient($Objclient)
                    ->setPrenom($faker->firstName())
                    ->setNom($faker->lastName())
                    ->setCreatedAt($faker->dateTimeBetween('-1 months', '-1 seconds'))
                    ->setUpdatedAt($faker->dateTime('now'));

                    $manager->persist($user);
                    $this->addReference('user_'.$value.'_'.$nbUser, $user);
                }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ClientsFixtures::class
        ];
    }
}
