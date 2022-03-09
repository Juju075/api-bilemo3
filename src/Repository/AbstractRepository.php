<?php

namespace App\Repository;

use PagerFanta\Pagerfanta;
use Doctrine\ORM\QueryBuilder;

use PagerFanta\Adapater\DoctrineORMAdapter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * Rappel PHP
 * abstract class classe qui ne va pas pouvoir être instanciée (directement).
 */
abstract class AbstractRepository extends ServiceEntityRepository 
{
    /**
     * Undocumented function
     *
     * @param QueryBuilder $qb le query builder qui contient le début de la requête permettant de rechercher les éléments à paginer.
     * @param integer $limit  le nombre maximum d'éléments par page ;
     * @param integer $offset l'index de l'élément par lequel on commence ;
     * @return void
     */
    protected function paginate(QueryBuilder $qb, $limit = 20, $offset = 0)
    {
        if (0 == $limit || 0 == $offset) {
            throw new \LogicException('$limit & $offstet must be greater than 0.');
        }
        
        $pager = new Pagerfanta(new DoctrineORMAdapter($qb));
        $currentPage = ceil(($offset + 1) / $limit);
        $pager->setCurrentPage($currentPage);
        $pager->setMaxPerPage((int) $limit);
        
        return $pager;
    }
}