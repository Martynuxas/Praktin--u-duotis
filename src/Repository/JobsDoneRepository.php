<?php

namespace App\Repository;

use App\Entity\JobsDone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobsDone|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobsDone|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobsDone[]    findAll()
 * @method JobsDone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobsDoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobsDone::class);
    }

    // /**
    //  * @return JobsDone[] Returns an array of JobsDone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JobsDone
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
