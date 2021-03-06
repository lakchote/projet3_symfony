<?php
/**
 * Created by PhpStorm.
 * User: BRANDON HEAT
 * Date: 19/10/2016
 * Time: 22:45
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class BilletRepository extends EntityRepository
{
    public function checkMaxCapacity($date)
    {
        return $this->createQueryBuilder('billet')
            ->leftJoin('billet.commande', 'commande')
            ->andWhere('commande.dateVisite = :date')
            ->andWhere('commande.isFinished = 1')
            ->setParameter('date', $date)
            ->getQuery()
            ->getScalarResult();
    }

}
