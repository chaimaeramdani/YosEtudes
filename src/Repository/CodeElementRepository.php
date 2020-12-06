<?php

namespace App\Repository;

use App\Entity\CodeElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CodeElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodeElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodeElement[]    findAll()
 * @method CodeElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodeElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CodeElement::class);
    }

    // /**
    //  * @return CodeElement[] Returns an array of CodeElement objects
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
    public function findOneBySomeField($value): ?CodeElement
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
