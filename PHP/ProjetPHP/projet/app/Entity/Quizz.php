<?php

namespace App\Entity;

use App\Entity\Question;
use App\Entity\User;

class Quizz
{
    protected int $id;

    protected ?string $mode = null;

    protected array $questions = array();

    protected ?User $user1 = null;

    protected ?User $user2 = null;

    protected ?string $startAt = null;

    protected ?User $winner = null;

    public function __construct(int $id, string $mode, array $questions, User $user1, string $startAt, User $user2 = null, User $winner = null){
        $this->id = $id;
        $this->mode = $mode;
        $this->startAt = $startAt;
        $this->winner = $winner;

        $this->user1 = $user1;
        if($user2 !== null){
            $this->user2 = $user2;
        }

        foreach ($questions as $question){
            array_push($this->questions, $question);
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMode()
    {
        return $this->mode;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function getUser1(): User
    {
        return $this->user1;
    }

    public function getUser2(): ?User
    {
        return $this->user2;
    }

    public function getStartAt(): ?string
    {
        return $this->startAt;
    }

    public function getWinner(): User
    {
        return $this->winner;
    }
}