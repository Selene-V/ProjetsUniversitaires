<?php

namespace App\Entity;

use App\Entity\Question;

class PossibleAnswer
{
    protected int $id;

    protected Question $question;

    protected ?string $label = null;

    protected bool $isRight;

    public function __construct(int $id, string $label, bool $isRight = false){
        $this->id = $id;
        $this->label = $label;
        $this->isRight = $isRight;
    }

    public function getId(): int
    {
        return $this->id;
    }

    ////get/set Question
    public function setQuestion(Question $question): PossibleAnswer
    {
        $this->question = $question;

        return $this;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    //get/set Label
    public function setLabel(string $label): PossibleAnswer
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    //get/set isRight
    public function setIsRight(bool $isRight): PossibleAnswer
    {
        $this->isRight = $isRight;

        return $this;
    }

    public function isRight(): bool
    {
        return $this->isRight;
    }

}