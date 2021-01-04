<?php

namespace App\Entity;

class Admin
{
    protected ?int $id;

    protected ?string $username = null;

    protected ?string $firstName = null;

	protected ?string $lastName = null;

	protected ?string $password = null;

    protected ?string $email = null;

    protected ?string $registerAt = null;

	protected bool $adminAccess = true;


	public function __construct(?int $id, ?string $username, ?string $firstName, ?string $lastName, ?string $email, ?string $registerAt, ?string $pasword = null){
        $this->id = $id;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->registerAt = $registerAt;

        $this->password = $pasword;

    }

    public function getId(): int
    {
        return $this->id;
    }

    //get/set username
    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): Admin
    {
        $this->username = $username;

        return $this;
    }

    //get/set firstname
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): Admin
    {
        $this->firstName = $firstName;

        return $this;
    }

    //get/set lastname
	public function getLastName(): ?string
    {
        return $this->firstName;
    }

    public function setLastName(?string $lastName): Admin
    {
        $this->lastName = $lastName;

        return $this;
    }

    //get/set email
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Admin
    {
        $this->email = $email;

        return $this;
    }

    //get/set register date
    public function getRegisterAt(): ?string
    {
        return $this->registerAt;
    }

    public function setRegisterAt(string $RegisterAt): Admin
    {
        $this->registerAt = $RegisterAt;

        return $this;
    }

    //get/set password
    public function getPassword(): ?string
    {
        if($this->password !== null){
            return $this->password;
        }
        return '';
    }

    public function setPassword(?string $password): Admin
    {
        $this->password = $password;

        return $this;
    }


    //access pages admin
	public function canAccess(): bool
	{
		return $this->adminAccess;
	}
}