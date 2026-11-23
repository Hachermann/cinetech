<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Movie>
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }


    public function findAllWithCategory(): array
    {
        return $this->createQueryBuilder('m')
            ->innerJoin('m.category', 'c')
            ->addSelect('c') // Hydrate l'objet Category dans la même requête SQL
            ->orderBy('m.id', 'DESC') // Les ajouts les plus récents apparaissent en tête
            ->getQuery()
            ->getResult();
    }
}
