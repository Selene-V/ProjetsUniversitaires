<?php

namespace App\Manager;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;

class ProjectManager
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
     * @param Project $project
     */
    public function insert(Project $project)
    {
        $this->em->persist($project);
        $this->em->flush();
    }

    public function update()
    {
        $this->em->flush();
    }
}
