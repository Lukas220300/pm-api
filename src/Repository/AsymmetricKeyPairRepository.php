<?php

namespace App\Repository;

use App\Entity\AsymmetricKeyPair;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AsymmetricKeyPair|null find($id, $lockMode = null, $lockVersion = null)
 * @method AsymmetricKeyPair|null findOneBy(array $criteria, array $orderBy = null)
 * @method AsymmetricKeyPair[]    findAll()
 * @method AsymmetricKeyPair[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AsymmetricKeyPairRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AsymmetricKeyPair::class);
    }

    // /**
    //  * @return AsymmetricKeyPair[] Returns an array of AsymmetricKeyPair objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AsymmetricKeyPair
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
