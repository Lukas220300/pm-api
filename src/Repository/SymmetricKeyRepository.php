<?php

namespace App\Repository;

use App\Entity\SymmetricKey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SymmetricKey|null find($id, $lockMode = null, $lockVersion = null)
 * @method SymmetricKey|null findOneBy(array $criteria, array $orderBy = null)
 * @method SymmetricKey[]    findAll()
 * @method SymmetricKey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymmetricKeyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SymmetricKey::class);
    }

    // /**
    //  * @return SymmetricKey[] Returns an array of SymmetricKey objects
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
    public function findOneBySomeField($value): ?SymmetricKey
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
