<?php

namespace App\Repository;

use App\Entity\EntryShareOverlay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EntryShareOverlay|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntryShareOverlay|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntryShareOverlay[]    findAll()
 * @method EntryShareOverlay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntryShareOverlayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntryShareOverlay::class);
    }

    // /**
    //  * @return EntryShareOverlay[] Returns an array of EntryShareOverlay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EntryShareOverlay
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
