<?php

namespace App\Repository;

use App\Entity\TarifReduit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TarifReduit|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifReduit|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifReduit[]    findAll()
 * @method TarifReduit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifReduitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TarifReduit::class);
    }

    // /**
    //  * @return TarifReduit[] Returns an array of TarifReduit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TarifReduit
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
