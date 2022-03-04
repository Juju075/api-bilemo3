<?php
declare(strict_types=1);
namespace App\DataFixtures;
use Faker;

use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ClientsFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordHasherInterface $clientPasswordEncoder;



    public function __construct(UserPasswordHasherInterface $clientPasswordEncoder){
        $this->clientPasswordEncoder = $clientPasswordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        //faire un truncate de la Bdd.

        $faker = Faker\Factory::create();
        //creation de 10 utilisateurs
        for ($nbClient = 0; $nbClient < 4 ; $nbClient++) { 

            $client = (new Client())
            ->setEmail($faker->email);

            if ($client === 1) {
                $client->setRoles(['ROLE_ADMIN']); //1 client role admin 
                $manager->persist($client);
                $this->addReference('client_'. $nbClient, $client);
            }
            $client->setRoles(['ROLE_CLIENT'])
            ->setPassword($this->clientPasswordEncoder->encodePassword($client, 'identique'));
            //$this->addReference($className . '_' . $i, $entity)
            //dates creation 
            $manager->persist($client);
            $this->addReference('client_'. $nbClient, $client);
        } 
        $manager->flush();
    }
}
