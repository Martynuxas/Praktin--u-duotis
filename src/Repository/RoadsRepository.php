<?php

namespace App\Repository;

use App\Entity\Roads;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Roads|null find($id, $lockMode = null, $lockVersion = null)
 * @method Roads|null findOneBy(array $criteria, array $orderBy = null)
 * @method Roads[]    findAll()
 * @method Roads[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoadsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Roads::class);
    }

    // /**
    //  * @return Roads[] Returns an array of Roads objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Roads
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findByRoadNumberStartAndEnd($roadNumber, $start, $end)
    {
        return $this->createQueryBuilder('Roads')
        ->andWhere('Roads.Section_Start >= :start')
        ->andWhere('Roads.Section_End <= :end')
        ->andWhere('Roads.Road_Number = :roadNumber')
        ->setParameter('start', $start)
        ->setParameter('end', $end)
        ->setParameter('roadNumber', $roadNumber)
        ->getQuery()
        ->getResult()
        ;
    }
}
