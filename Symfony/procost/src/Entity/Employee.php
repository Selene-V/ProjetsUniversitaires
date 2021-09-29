<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 * @ORM\Table(name="employee")
 */
class Employee
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
    private ?string $prenom = null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     */
    private ?string $nom = null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     * @Assert\Email(message="L'email {{ value }} n'est pas valide.")
     */
    private ?string $mail = null;

    /**
     * @ORM\ManyToOne(targetEntity=Metier::class, inversedBy="employees")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Metier $metier = null;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     * @Assert\PositiveOrZero(message="Ce champ ne peut comporter que de nombres positifs ou zéro.")
     * @Assert\Type(type="float", message = "La valeur {{ value }} doit être de type {{ type }}")
     */
    private ?float $coutHoraire = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTime $dateEmbauche;

    /**
     * @ORM\OneToMany(targetEntity=ProductionTime::class, mappedBy="employee")
     */
    private Collection $productionTimes;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="employee", cascade={"persist", "remove"})
     */
    private ?User $user = null;

    /**
     * Employee constructor.
     */
    public function __construct()
    {
        $this->productionTimes = new ArrayCollection();
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
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return $this
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return $this
     */
    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Metier|null
     */
    public function getMetier(): ?Metier
    {
        return $this->metier;
    }

    /**
     * @param Metier|null $metier
     * @return $this
     */
    public function setMetier(?Metier $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCoutHoraire(): ?float
    {
        return $this->coutHoraire;
    }

    /**
     * @param float $coutHoraire
     * @return $this
     */
    public function setCoutHoraire(float $coutHoraire): self
    {
        $this->coutHoraire = $coutHoraire;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateEmbauche(): ?DateTime
    {
        return $this->dateEmbauche;
    }

    /**
     * @param DateTime $dateEmbauche
     * @return $this
     */
    public function setDateEmbauche(DateTime $dateEmbauche): self
    {
        $this->dateEmbauche = $dateEmbauche;

        return $this;
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
            $productionTime->setEmployee($this);
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
            if ($productionTime->getEmployee() === $this) {
                $productionTime->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user): self
    {
        // set the owning side of the relation if necessary
        if ($user->getEmployee() !== $this) {
            $user->setEmployee($this);
        }

        $this->user = $user;

        return $this;
    }
}
