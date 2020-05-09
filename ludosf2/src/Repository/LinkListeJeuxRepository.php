<?php

namespace App\Repository;

use App\Entity\LinkListeJeux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeJeux|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeJeux|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeJeux[]    findAll()
 * @method ListeJeux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkListeJeuxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkListeJeux::class);
    }
}
