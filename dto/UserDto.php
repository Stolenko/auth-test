<?php

namespace app\dto;

/**
 * Class UserDto
 * @package app\dto
 */
class UserDto
{
    /**
     * @var int|null $id
     */
    private $id;
    /**
     * @var string $firstName
     */
    private $firstName;
    /**
     * @var string $lastName
     */
    private $lastName;
    /**
     * @var int $gender
     */
    private $gender;
    /**
     * @var string $birthAt
     */
    private $birthAt;
    /**
     * @var string $phone
     */
    private $phone;
    /**
     * @var string $email
     */
    private $email;
    /**
     * @var null|string
     */
    private $passwordHash;
    /**
     * @var null|string
     */
    private $createdAt;
    /**
     * @var null|string
     */
    private $updatedAt;

    /**
     * UserDto constructor.
     * @param int|null $id
     * @param string $firstName
     * @param string $lastName
     * @param int $gender
     * @param string $birthAt
     * @param string $phone
     * @param string $email
     * @param null|string $passwordHash
     * @param null|string $createdAt
     * @param null|string $updatedAt
     */
    public function __construct(
        ?int $id = null,
        string $firstName,
        string $lastName,
        int $gender,
        string $birthAt,
        string $phone,
        string $email,
        ?string $passwordHash = null,
        ?string $createdAt = null,
        ?string $updatedAt = null
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->birthAt = $birthAt;
        $this->phone = $phone;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getBirthAt(): string
    {
        return $this->birthAt;
    }

    /**
     * @param string $birthAt
     */
    public function setBirthAt(string $birthAt): void
    {
        $this->birthAt = $birthAt;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return null|string
     */
    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    /**
     * @param null|string $passwordHash
     */
    public function setPasswordHash(?string $passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return null|string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param null|string $createdAt
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return null|string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param null|string $updatedAt
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }


}