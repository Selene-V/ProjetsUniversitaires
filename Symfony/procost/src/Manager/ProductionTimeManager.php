<?php

namespace App\Manager;

use App\Entity\ProductionTime;
use Doctrine\ORM\EntityManagerInterface;

class ProductionTimeManager
{
    private EntityManagerInterface $em;

    /**
     * ContactManager constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param ProductionTime $productionTime
     */
    public function insert(ProductionTime $productionTime)
    {
        $this->em->persist($productionTime);
        $this->em->flush();
    }
}
