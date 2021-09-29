<?php

namespace App\Manager;

use App\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;

class EmployeeManager
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
     * @param Employee $employee
     */
    public function insert(Employee $employee)
    {
        $this->em->persist($employee);
        $this->em->flush();
    }

    public function update()
    {
        $this->em->flush();
    }
}
