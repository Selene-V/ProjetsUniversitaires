<?php

namespace App\Entity;


class Question
{
    use HydrationTrait;

    protected ?int $id;

    protected ?string $label = null;

    protected ?Theme $theme = null;

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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): void
    {
        $this->theme = $theme;
    }




}