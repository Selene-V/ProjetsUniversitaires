<?php

namespace App\Entity;

use App\Repository\ProductionTimeRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductionTimeRepository::class)
 * @ORM\Table(name="production_time")
 */
class ProductionTime
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="productionTimes")
     */
    private ?Project $project = null;

    /**
     * @ORM\ManyToOne(targetEntity=Employee::class, inversedBy="productionTimes")
     */
    private ?Employee $employee = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $nbHeures = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $dateCreation;

    /**
     * ProductionTime constructor.
     */
    public function __construct()
    {
        $this->dateCreation = new DateTime();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Project|null
     */
    public function getProject(): ?Project
    {
        return $this->project;
    }

    /**
     * @param Project|null $project
     * @return $this
     */
    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return Employee|null
     */
    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    /**
     * @param Employee|null $employee
     * @return $this
     */
    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbHeures(): ?int
    {
        return $this->nbHeures;
    }

    /**
     * @param int|null $nbHeures
     * @return $this
     */
    public function setNbHeures(?int $nbHeures): self
    {
        $this->nbHeures = $nbHeures;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateCreation(): DateTime
    {
        return $this->dateCreation;
    }
}
