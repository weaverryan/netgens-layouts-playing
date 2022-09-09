<?php

namespace App\Repository;

use App\Entity\Screencast;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Screencast>
 *
 * @method Screencast|null find($id, $lockMode = null, $lockVersion = null)
 * @method Screencast|null findOneBy(array $criteria, array $orderBy = null)
 * @method Screencast[]    findAll()
 * @method Screencast[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScreencastRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Screencast::class);
    }

    public function add(Screencast $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Screencast $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function search(?string $search, int $offset = 0, ?int $limit = null): array
    {
        return $this->createSearchQueryBuilder($search)
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function createSearchQueryBuilder(?string $search): QueryBuilder
    {
        return $this->createQueryBuilder('screencast')
            ->andWhere('screencast.title LIKE :search OR screencast.description LIKE :search')
            ->setParameter('search', '%'.$search.'%');
    }
}
