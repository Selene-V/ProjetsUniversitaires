<?php

namespace App\Repository\Store;

use App\Entity\Store\Brand;
use App\Entity\Store\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{

    /**
     * ProductRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

// 1ere facon de faire :
//    /**
//     * @return Product[]
//     */
//    public function findFourLastProducts() : array
//    {
//        return $this->createQueryBuilder('p')
//            ->addSelect('i')
//            ->leftJoin('p.image', 'i')
//            ->orderBy('p.createdAt', 'DESC')
//            ->setMaxResults(4)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

// 2 eme facon de faire (mieux que la 1ere)
    /**
     * @return Product[]
     */
    public function findFourLastProducts() : array
    {
        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC')
            ->setMaxResults(4)
        ;

        $this->addImage($qb);

        return $qb->getQuery()->getResult();
    }

    /**
     * @param QueryBuilder $qb
     */
    private function addImage(QueryBuilder $qb) : void
    {
        $qb
            ->addSelect('i')
            ->leftJoin('p.image', 'i');
    }

    /**
     * @param QueryBuilder $qb
     */
    private function addBrand(QueryBuilder $qb) : void
    {
        $qb
            ->addSelect('b')
            ->leftJoin('p.brand', 'b');
    }

    /**
     * @param QueryBuilder $qb
     */
    private function addColors(QueryBuilder $qb) : void
    {
        $qb
            ->addSelect('c')
            ->leftJoin('p.colors', 'c');
    }

    /**
     * @param QueryBuilder $qb
     */
    private function addComments(QueryBuilder $qb) : void
    {
        $qb
            ->addSelect(['com', 'u'])
            ->leftJoin('p.comments', 'com')
            ->leftJoin('com.user', 'u');
    }

    /**
     * @param int $id
     * @return Product|null
     * @throws NonUniqueResultException
     */
    public function findOneWithAllInformations(int $id) : ?Product
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->orderBy('com.createdAt', 'DESC')
        ;

        $this->addImage($qb);
        $this->addBrand($qb);
        $this->addColors($qb);
        $this->addComments($qb);

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @return Product[]
     */
    public function findMostPopularProducts(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.comments', 'c')
            ->orderBy('COUNT(c)', 'DESC')
            ->groupBy('p')
            ->setMaxResults(4)
        ;

        $this->addImage($qb);

        return $qb->getQuery()->getResult();
    }

    /**
     * @param Brand $brand
     * @return Product[]
     */
    public function findByBrand(Brand $brand): array
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.brand = :b')
            ->setParameter('b', $brand)
        ;

        $this->addImage($qb);

        return $qb->getQuery()->getResult();
    }
}
