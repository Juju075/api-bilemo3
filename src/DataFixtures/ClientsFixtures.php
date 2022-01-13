<?php
declare(strict_types=1);
namespace App\DataFixtures;
use App\Entity\Client;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class ClientsFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordEncoderInterface $userPasswordEncoder;



    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder){
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        //faire un truncate de la Bdd.

        $faker = Faker\Factory::create();
        //creation de 10 utilisateurs
        for ($nbUsers = 0; $nbUsers < 4 ; $nbUsers++) { 

            $client = (new Client())
            ->setEmail($faker->email);
            if ($client === 1) {
                $client->setRoles(['ROLE_ADMIN']); //1 client role admin
            }
            $client->setRoles(['ROLE_USER'])
            ->setPassword($this->clientPasswordEncoder->encodePassword($client, 'identique'));
            //$this->addReference($className . '_' . $i, $entity)
            $manager->persist($client);

        } 
        $manager->flush();
    }
}
