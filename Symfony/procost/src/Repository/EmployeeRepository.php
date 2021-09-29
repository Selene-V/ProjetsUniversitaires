<?php

namespace App\Repository;

use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employee[]    findAll()
 * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeRepository extends ServiceEntityRepository
{
    /**
     * EmployeeRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    /**
     * @param $page
     * @return Employee[]
     */
    public function findAllByPage($page):array
    {
        $qb = $this->createQueryBuilder('e')
            ->setFirstResult(($page - 1) *  10)
            ->setMaxResults(10);
        ;

        return $qb->getQuery()->getResult();

    }

    /**
     * @return int|mixed|string|null
     * @throws NonUniqueResultException
     */
    public function countAllEmployees(): array
    {
        $qb = $this->createQueryBuilder('e')
            ->select('count(e)')
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @return Employee[]
     */
    public function findAllWithMetier(): array
    {
        $qb = $this->createQueryBuilder('e');

        $this->addMetier($qb);

        return $qb->getQuery()->getResult();
    }

    /**
     * @param int $id
     * @return Employee|null
     * @throws NonUniqueResultException
     */
    public function findOneWithMetier(int $id) : ?Employee
    {
        $qb = $this->createQueryBuilder('e')
            ->where('e.id = :id')
            ->setParameter('id', $id)
        ;

        $this->addMetier($qb);

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @param int $id
     * @return array
     * @throws NonUniqueResultException
     */
    public function countNumberEmployeeByMetier(int $id): array
    {
        $qb = $this->createQueryBuilder('e')
            ->select('count(e)')
            ->where('e.metier = :id')
            ->setParameter('id', $id)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @return array
     * @throws NonUniqueResultException
     */
    public function countEmployees(): array
    {
        $qb = $this->createQueryBuilder('e')
            ->select('count(e)')
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @return array
     */
    public function findTopEmployee(): array
    {
        $qb = $this->createQueryBuilder('e')
            ->select('e as employee, sum(pt.nbHeures*e.coutHoraire) as coutTotal')
            ->groupBy('e')
            ->orderBy('coutTotal', 'DESC')
            ->setMaxResults(1)
        ;
        $this->addProductionTime($qb);

        return $qb->getQuery()->getResult();
    }

    /**
     * @param QueryBuilder $qb
     */
    private function addMetier(QueryBuilder $qb) : void
    {
        $qb
            ->addSelect('m')
            ->leftJoin('e.metier', 'm');
    }

    /**
     * @param QueryBuilder $qb
     */
    private function addProductionTime(QueryBuilder $qb) : void
    {
        $qb
            ->addSelect('pt')
            ->leftJoin('e.productionTimes', 'pt');
    }
}
