<?php

namespace App\Repository;

use App\Entity\PrivateKey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivateKey|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateKey|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateKey[]    findAll()
 * @method PrivateKey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateKeyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateKey::class);
    }

    // /**
    //  * @return PrivateKey[] Returns an array of PrivateKey objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrivateKey
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
