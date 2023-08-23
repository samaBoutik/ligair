<?php

namespace App\Repository;

use App\Entity\GeorefFranceCommune;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GeorefFranceCommune>
 *
 * @method GeorefFranceCommune|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeorefFranceCommune|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeorefFranceCommune[]    findAll()
 * @method GeorefFranceCommune[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeorefFranceCommuneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeorefFranceCommune::class);
    }

//    /**
//     * @return GeorefFranceCommune[] Returns an array of GeorefFranceCommune objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GeorefFranceCommune
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
