<?php

namespace App\Repository;

use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Project|null find($id, $lockMode = null, $lockVersion = null)
 * @method Project|null findOneBy(array $criteria, array $orderBy = null)
 * @method Project[]    findAll()
 * @method Project[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectRepository extends ServiceEntityRepository
{
    /**
     * ProjectRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

    /**
     * @param $page
     * @return Project[]
     */
    public function findAllByPage($page):array
    {
        $qb = $this->createQueryBuilder('p')
            ->setFirstResult(($page - 1) *  10)
            ->setMaxResults(10);
        ;

        return $qb->getQuery()->getResult();

    }

    /**
     * @return int|mixed|string|null
     * @throws NonUniqueResultException
     */
    public function countAllProjects(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('count(p)')
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @return array
     * @throws NonUniqueResultException
     */
    public function countProjectsInProgress(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('count(p)')
            ->where('p.dateLivraison IS NULL')
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @return array
     * @throws NonUniqueResultException
     */
    public function countProjectsDelivered(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('count(p)')
            ->where('p.dateLivraison IS NOT NULL')
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @return Project[]
     */
    public function findFiveLastProjects() : array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p as project')
            ->leftJoin('p.productionTimes', 'pt')
            ->leftJoin('pt.employee', 'e')
            ->addSelect('pt, e, sum(pt.nbHeures*e.coutHoraire) as coutTotal')
            ->groupBy('p.id')
            ->orderBy('p.dateCreation', 'DESC')
            ->setMaxResults(5)
        ;

        return $qb->getQuery()->getResult();
    }

    /**
     * @return array
     */
    public function profitability(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p as project')
            ->leftJoin('p.productionTimes', 'pt')
            ->leftJoin('pt.employee', 'e')
            ->addSelect('pt, e, sum(pt.nbHeures*e.coutHoraire) as coutTotal')
            ->groupBy('p.id')
            ->having('p.dateLivraison IS NOT NULL')
            ->andHaving('coutTotal < p.prixVente')
        ;

        return $qb->getQuery()->getResult();
    }
}
