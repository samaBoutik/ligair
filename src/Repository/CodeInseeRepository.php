<?php

namespace App\Repository;

use App\Entity\CodeInsee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CodeInsee>
 *
 * @method CodeInsee|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodeInsee|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodeInsee[]    findAll()
 * @method CodeInsee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodeInseeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CodeInsee::class);
    }

//    /**
//     * @return CodeInsee[] Returns an array of CodeInsee objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CodeInsee
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
