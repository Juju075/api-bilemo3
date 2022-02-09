<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @return User
     *
     * @param [type] $id
     * @param [type] $user_id
     * @return void
     */    
    public function findOneByQueryBuilder($id, $user_id) // critere user_id id user
    {
        dump('query processing', $id, $user_id);
        
        $resultat = $this->createQueryBuilder('u')
            ->andWhere('u.id = :id', 'u.client_id = :user_id')
            ->setParameter('id',$id)
            ->setParameter('user_id',$user_id)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    
            dd($resultat);

        // return $this->createQueryBuilder('u')
        //     ->andWhere('u.id = :id', 'u.client_id = :user_id')
        //     ->setParameter('id',$id)
        //     ->setParameter('user_id',$user_id)
        //     ->getQuery()
        //     ->getOneOrNullResult()
        //     ;
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
