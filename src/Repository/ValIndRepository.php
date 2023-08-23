<?php

namespace App\Repository;

use App\Entity\ValInd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ValInd>
 *
 * @method ValInd|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValInd|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValInd[]    findAll()
 * @method ValInd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValIndRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValInd::class);
    }

//    /**
//     * @return ValInd[] Returns an array of ValInd objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ValInd
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
