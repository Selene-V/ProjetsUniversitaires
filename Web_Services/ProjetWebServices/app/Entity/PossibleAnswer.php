<?php

namespace App\Entity;

class PossibleAnswer
{
    use HydrationTrait;

    protected ?int $id;

    protected ?Question $question;

    protected ?string $label = null;

    protected ?bool $isRight;

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

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): void
    {
        $this->question = $question;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    public function getIsRight(): ?bool
    {
        return $this->isRight;
    }

    public function setIsRight(?bool $isRight): void
    {
        $this->isRight = $isRight;
    }

}