<?php

namespace App\Repository;

use App\Entity\Shortner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Shortner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shortner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shortner[]    findAll()
 * @method Shortner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShortnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shortner::class);
    }

    // /**
    //  * @return Shortner[] Returns an array of Shortner objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Shortner
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
