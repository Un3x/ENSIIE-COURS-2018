<?php
/**
 * Created by PhpStorm.
 * User: unex
 * Date: 09/06/18
 * Time: 15:51
 */

namespace User\Entity;

/**
 * Class User
 * @package User\Entity
 */
class User
{
    /**
     * @var null|integer
     */
    private $id;

    /**
     * @var string
     */
    private $nickname;

    /**
     * @var string
     */
    private $password;

    /**
     * @var null|\DateTime
     */
    private $createdAt;


    /**
     * @var null|\DateTime
     */
    private $updatedAt;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return User
     */
    public function setId(?int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     * @return User
     */
    public function setNickname(string $nickname): User
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime|null $createdAt
     * @return User
     */
    public function setCreatedAt(?\DateTime $createdAt): User
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|null $updatedAt
     * @return User
     */
    public function setUpdatedAt(?\DateTime $updatedAt): User
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}