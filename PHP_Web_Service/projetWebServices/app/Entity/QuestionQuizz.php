<?php

namespace App\Entity;

use DateTime;


class QuestionQuizz
{
    use HydrationTrait;

    protected ?int $id = null;

    protected ?int $idQuizz = null;

    protected ?int $idQuestion = null;


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

    public function getIdQuizz(): ?int
    {
        return $this->idQuizz;
    }

    public function setIdQuizz(?int $idQuizz): void
    {
        $this->idQuizz = $idQuizz;
    }

    public function getIdQuestion(): ?int
    {
        return $this->idQuestion;
    }

    public function setIdQuestion(?int $idQuestion): void
    {
        $this->idQuestion = $idQuestion;
    }


}