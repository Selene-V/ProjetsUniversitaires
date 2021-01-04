<?php

namespace App\Entity;

use App\Entity\Theme;

class Question
{
    protected int $id;

    protected ?string $label = null;

    protected Theme $theme;

    public function __construct(int $id, string $label, Theme $theme){
        $this->id = $id;
        $this->label = $label;
        $this->theme = $theme;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }


    public function setLabel(?string $label): Question
    {
        $this->label = $label;

        return $this;
    }


    public function getTheme(): Theme
    {
        return $this->theme;
    }


    public function setTheme(Theme $theme): Question
    {
        $this->theme = $theme;

        return $this;
    }


}