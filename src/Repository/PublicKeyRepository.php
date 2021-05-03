<?php

namespace App\Repository;

use App\Entity\PublicKey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PublicKey|null find($id, $lockMode = null, $lockVersion = null)
 * @method PublicKey|null findOneBy(array $criteria, array $orderBy = null)
 * @method PublicKey[]    findAll()
 * @method PublicKey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicKeyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PublicKey::class);
    }

    // /**
    //  * @return PublicKey[] Returns an array of PublicKey objects
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
    public function findOneBySomeField($value): ?PublicKey
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
