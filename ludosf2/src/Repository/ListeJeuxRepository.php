<?php

namespace App\Repository;

use App\Entity\ListeJeux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeJeux|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeJeux|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeJeux[]    findAll()
 * @method ListeJeux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeJeuxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeJeux::class);
    }

    public function findAllWithoutDouble()
    {
        return $this->createQueryBuilder('l')
            ->orderBy('l.NomJeu', 'ASC')
            //->select('l.NomJeu')->distinct()
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return ListeJeux[] Returns an array of ListeJeux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeJeux
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
