<?php

namespace App\Entity;

class Theme
{
    use HydrationTrait;

    protected ?int $id;

    protected ?string $nom = null;

    public function __construct(){

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }



}