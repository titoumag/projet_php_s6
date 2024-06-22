<?php

namespace App\Repository;

use App\Entity\Evenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Evenement>
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

   /**
    * @return Evenement[] Returns an array of Evenement objects
    */
   public function findByWithPagination($nb_debut ,$nb_max): array
   {
       return $this->createQueryBuilder('e')
        //    ->andWhere('e.exampleField = :val')
        //    ->setParameter('val', $value)
           ->setFirstResult( $nb_debut )
           ->orderBy('e.id', 'ASC')
           ->setMaxResults($nb_max)
           ->getQuery()
           ->getResult()
       ;
   }

//    public function findOneBySomeField($value): ?Evenement
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
