<?php

namespace App\Repository;

use App\Entity\DateEch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DateEch>
 *
 * @method DateEch|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateEch|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateEch[]    findAll()
 * @method DateEch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateEchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateEch::class);
    }

//    /**
//     * @return DateEch[] Returns an array of DateEch objects
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

//    public function findOneBySomeField($value): ?DateEch
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
