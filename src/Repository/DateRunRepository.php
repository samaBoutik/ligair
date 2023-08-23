<?php

namespace App\Repository;

use App\Entity\DateRun;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DateRun>
 *
 * @method DateRun|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateRun|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateRun[]    findAll()
 * @method DateRun[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateRunRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateRun::class);
    }

//    /**
//     * @return DateRun[] Returns an array of DateRun objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DateRun
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
