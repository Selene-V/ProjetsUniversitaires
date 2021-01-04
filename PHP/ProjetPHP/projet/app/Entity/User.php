<?php

namespace App\Entity;

class User
{
    protected int $id;

    protected ?string $username = null;

    protected ?string $firstName = null;

    protected ?string $lastName = null;

    protected ?string $email = null;

    protected ?string $registerAt = null;

    protected ?int $point = null;


    public function __construct(int $id, string $username, string $firstName, string $lastName, string $email ,string $registerAt, int $point){
        $this->id = $id;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->registerAt = $registerAt;
        $this->point = $point;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): User
    {
        $this->username = $username;

        return $this;
    }


    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): User
    {
        $this->firstName = $firstName;

        return $this;
    }


    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): User
    {
        $this->lastName = $lastName;

        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): User
    {
        $this->email = $email;

        return $this;
    }


    public function getRegisterAt(): ?string
    {
        return $this->registerAt;
    }

    public function setRegisterAt(?string $registerAt): User
    {
        $this->registerAt = $registerAt;
        return $this;
    }


    public function getPoint(): ?int
    {
        return $this->point;
    }


    public function setPoint(?int $point): User
    {
        $this->point = $point;
        return $this;
    }
}
