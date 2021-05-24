<?php

namespace App\Repository;

use App\Entity\NiveauMaitrise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NiveauMaitrise|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauMaitrise|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauMaitrise[]    findAll()
 * @method NiveauMaitrise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauMaitriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauMaitrise::class);
    }

    // /**
    //  * @return NiveauMaitrise[] Returns an array of NiveauMaitrise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NiveauMaitrise
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
