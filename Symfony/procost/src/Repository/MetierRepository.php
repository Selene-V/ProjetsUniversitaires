<?php

namespace App\Repository;

use App\Entity\Metier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Metier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Metier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Metier[]    findAll()
 * @method Metier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetierRepository extends ServiceEntityRepository
{
    /**
     * MetierRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Metier::class);
    }

    /**
     * @param $page
     * @return Metier[]
     */
    public function findAllByPage($page):array
    {
        $qb = $this->createQueryBuilder('m')
            ->setFirstResult(($page - 1) *  10)
            ->setMaxResults(10);
        ;

        return $qb->getQuery()->getResult();

    }


    /**
     * @return int|mixed|string|null
     * @throws NonUniqueResultException
     */
    public function countAllMetiers(): array
    {
        $qb = $this->createQueryBuilder('m')
            ->select('count(m)')
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }
}
