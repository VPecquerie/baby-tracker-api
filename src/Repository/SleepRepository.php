<?php

namespace App\Repository;

use App\Entity\Sleep;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sleep|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sleep|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sleep[]    findAll()
 * @method Sleep[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SleepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sleep::class);
    }

    // /**
    //  * @return Sleep[] Returns an array of Sleep objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sleep
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
