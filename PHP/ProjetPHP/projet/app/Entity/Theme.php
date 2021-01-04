<?php

namespace App\Entity;

class Theme
{
    protected int $id;

    protected ?string $name = null;

    public function __construct(int $id, string $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Theme
    {
        $this->name = $name;

        return $this;
    }

}