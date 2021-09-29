<?php

namespace App\Repository;

use App\Entity\ProductionTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductionTime|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductionTime|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductionTime[]    findAll()
 * @method ProductionTime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductionTimeRepository extends ServiceEntityRepository
{
    /**
     * ProductionTimeRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductionTime::class);
    }

    /**
     * @return array
     * @throws NonUniqueResultException
     */
    public function sumNbHours(): array
    {
        $qb = $this->createQueryBuilder('pt')
            ->select('sum(pt.nbHeures)')
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @return array
     */
    public function findTenLastProductionTimeWithAllInformations(): array
    {
        $qb = $this->createQueryBuilder('pt')
            ->orderBy('pt.dateCreation', 'DESC')
            ->setMaxResults(10)
        ;

        $this->addEmployee($qb);
        $this->addProject($qb);

        return $qb->getQuery()->getResult();
    }

    /**
     * @param int $id
     * @return array
     */
    public function employeeByProject(int $id):array
    {
        $qb = $this->createQueryBuilder('pt')
            ->select('sum(pt.nbHeures*e.coutHoraire) as coutTotal')
            ->leftJoin('pt.employee', 'e')
            ->leftJoin('pt.project', 'p')
            ->where('pt.project = :id')
            ->setParameter('id', $id)
            ->groupBy('pt.employee')
        ;
        return $qb->getQuery()->getResult();
    }

    /**
     * @param $id
     * @return array
     * @throws NonUniqueResultException
     */
    public function countAllProductionsTimesByProject($id):array
    {
        $qb = $this->createQueryBuilder('pt')
            ->select('count(pt)')
            ->where('pt.project = :id')
            ->setParameter('id', $id)
        ;
        return $qb->getQuery()->getOneOrNullResult();

    }

    /**
     * @param int $id
     * @param int $page
     * @return array
     */
    public function findProductionsTimesByProjectByPage(int $id, int $page): array
    {
        $qb = $this->createQueryBuilder('pt')
            ->addSelect('e')
            ->addSelect('p')
            ->leftJoin('pt.project', 'p')
            ->leftJoin('pt.employee', 'e')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->orderBy('pt.dateCreation', 'DESC')
            ->setFirstResult(($page - 1) *  5)
            ->setMaxResults(5)
        ;

        return $qb->getQuery()->getResult();
    }

    /**
     * @param int $id
     * @param int $page
     * @return ProductionTime[]
     */
    public function findProductionsTimesByEmployeeByPage(int $id, int $page):array
    {
        $qb = $this->createQueryBuilder('pt')
            ->select('pt as productionTime')
            ->leftJoin('pt.project', 'p')
            ->leftJoin('pt.employee', 'e')
            ->where('e.id = :id')
            ->setParameter('id', $id)
            ->addSelect('sum(pt.nbHeures*e.coutHoraire) as coutTotal')
            ->groupBy('pt')
            ->orderBy('pt.dateCreation', 'DESC')
            ->setFirstResult(($page - 1) *  5)
            ->setMaxResults(5)
        ;

        return $qb->getQuery()->getResult();
    }

    /**
     * @param int $id
     * @return array
     * @throws NonUniqueResultException
     */
    public function countAllProductionsTimesByEmployee(int $id): array
    {
        $qb = $this->createQueryBuilder('pt')
            ->select('pt as productionTime')
            ->leftJoin('pt.project', 'p')
            ->leftJoin('pt.employee', 'e')
            ->where('e.id = :id')
            ->addSelect('count(pt)')
            ->setParameter('id', $id)
        ;
        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @param QueryBuilder $qb
     */
    private function addProject(QueryBuilder $qb) : void
    {
        $qb
            ->addSelect('p')
            ->leftJoin('pt.project', 'p');
    }

    /**
     * @param QueryBuilder $qb
     */
    private function addEmployee(QueryBuilder $qb) : void
    {
        $qb
            ->addSelect('e')
            ->leftJoin('pt.employee', 'e');
    }
}
