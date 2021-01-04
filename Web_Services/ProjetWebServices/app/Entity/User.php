<?php

namespace App\Entity;

use DateTime;
require_once ('HydrationTrait.php');

class User
{

    use HydrationTrait;

    protected ?int $id = null;

    protected ?string $username = null;

    protected ?string $firstName = null;

    protected ?string $lastName = null;

    protected ?string $email = null;

    protected ?DateTime $registerAt = null;

    protected ?int $point = null;

    protected ?string $password = null;


    public function __construct(){
        $this->setRegisterAt(new DateTime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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


    public function getRegisterAt(): ?DateTime
    {
        return $this->registerAt;
    }

    public function setRegisterAt(?DateTime $registerAt): User
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }


}
