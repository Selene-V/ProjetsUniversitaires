<?php

namespace App\Manager;

use App\Entity\Metier;
use Doctrine\ORM\EntityManagerInterface;

class MetierManager
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
     * @param Metier $metier
     */
    public function insert(Metier $metier)
    {
        $this->em->persist($metier);
        $this->em->flush();
    }

    public function update()
    {
        $this->em->flush();
    }

    /**
     * @param Metier $metier
     */
    public function delete(Metier $metier)
    {
        $this->em->remove($metier);
        $this->em->flush();
    }
}
