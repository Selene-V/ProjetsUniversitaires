<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 * @ORM\Table(name="project")
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     */
    private ?string $nom = null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     * @Assert\Length(min="10", minMessage="Votre message doit contenir au minimum {{ limit }} caractères.")
     */
    private ?string $description = null;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     * @Assert\PositiveOrZero(message="Ce champ ne peut comporter que de nombres positifs ou zéro.")
     */
    private ?float $prixVente = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $dateCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $dateLivraison = null;

    /**
     * @ORM\OneToMany(targetEntity=ProductionTime::class, mappedBy="project")
     */
    private Collection $productionTimes;

    /**
     * Project constructor.
     */
    public function __construct()
    {
        $this->productionTimes = new ArrayCollection();
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
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return $this
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrixVente(): ?float
    {
        return $this->prixVente;
    }

    /**
     * @param float $prixVente
     * @return $this
     */
    public function setPrixVente(float $prixVente): self
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateCreation(): ?DateTime
    {
        return $this->dateCreation;
    }

    /**
     * @return DateTime|null
     */
    public function getDateLivraison(): ?DateTime
    {
        return $this->dateLivraison;
    }

    /**
     * @param DateTime|null $dateLivraison
     */
    public function setDateLivraison(?DateTime $dateLivraison): void
    {
        $this->dateLivraison = $dateLivraison;
    }

    /**
     * @return Collection|ProductionTime[]
     */
    public function getProductionTimes(): Collection
    {
        return $this->productionTimes;
    }

    /**
     * @param ProductionTime $productionTime
     * @return $this
     */
    public function addProductionTime(ProductionTime $productionTime): self
    {
        if (!$this->productionTimes->contains($productionTime)) {
            $this->productionTimes[] = $productionTime;
            $productionTime->setProject($this);
        }

        return $this;
    }

    /**
     * @param ProductionTime $productionTime
     * @return $this
     */
    public function removeProductionTime(ProductionTime $productionTime): self
    {
        if ($this->productionTimes->removeElement($productionTime)) {
            // set the owning side to null (unless already changed)
            if ($productionTime->getProject() === $this) {
                $productionTime->setProject(null);
            }
        }

        return $this;
    }
}
