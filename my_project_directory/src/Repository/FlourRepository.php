<?php

namespace App\Repository;

use App\Entity\Flour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Flour>
 *
 * @method Flour|null find($id, $lockMode = null, $lockVersion = null)
 * @method Flour|null findOneBy(array $criteria, array $orderBy = null)
 * @method Flour[]    findAll()
 * @method Flour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FlourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Flour::class);
    }

//    /**
//     * @return Flour[] Returns an array of Flour objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Flour
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
