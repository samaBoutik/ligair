<?php

namespace App\Repository;

use App\Entity\PollResp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PollResp>
 *
 * @method PollResp|null find($id, $lockMode = null, $lockVersion = null)
 * @method PollResp|null findOneBy(array $criteria, array $orderBy = null)
 * @method PollResp[]    findAll()
 * @method PollResp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PollRespRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PollResp::class);
    }

//    /**
//     * @return PollResp[] Returns an array of PollResp objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PollResp
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
