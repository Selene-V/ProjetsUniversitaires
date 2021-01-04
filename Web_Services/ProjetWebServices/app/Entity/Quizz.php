<?php

namespace App\Entity;

use DateTime;


class Quizz
{
    use HydrationTrait;

    protected ?int $id = null;

    protected ?string $mode = null;

    protected ?array $questions = array();

    protected ?User $user1 = null;

    protected ?User $user2 = null;

    protected ?DateTime $startAt = null;

    protected ?User $winner = null;

    public function __construct(){
        $this->setStartAt(new DateTime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(?string $mode): void
    {
        $this->mode = $mode;
    }

    public function getQuestions(): ?array
    {
        return $this->questions;
    }

    public function setQuestions(?array $questions): void
    {
        $this->questions = $questions;
    }

    public function getUser1(): ?User
    {
        return $this->user1;
    }

    public function setUser1(?User $user1): void
    {
        $this->user1 = $user1;
    }

    public function getUser2(): ?User
    {
        return $this->user2;
    }

    public function setUser2(?User $user2): void
    {
        $this->user2 = $user2;
    }

    public function getStartAt(): ?DateTime
    {
        return $this->startAt;
    }

    public function setStartAt(?DateTime $startAt): void
    {
        $this->startAt = $startAt;
    }

    public function getWinner(): ?User
    {
        return $this->winner;
    }

    public function setWinner(?User $winner): void
    {
        $this->winner = $winner;
    }
}