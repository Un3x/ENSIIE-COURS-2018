<?php
/**
 * Created by PhpStorm.
 * User: unex
 * Date: 12/05/18
 * Time: 12:31
 */

namespace Todo\Entity;

/**
 * Class Task
 * @package Todo\Entity
 */
class Task
{
    /**
     * @var null|integer
     */
    private $id;

    /**
     * @var null|integer
     */
    private $todoId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var null|\DateTime
     */
    private $createdAt;

    /**
     * @var null|\DateTime
     */
    private $updatedAt;

    /**
     * @var null|\DateTime
     */
    private $doneAt;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Task
     */
    public function setId(? int $id): Task
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTodoId(): ?int
    {
        return $this->todoId;
    }

    /**
     * @param int $todoId
     * @return Task
     */
    public function setTodoId(int $todoId): Task
    {
        $this->todoId = $todoId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Task
     */
    public function setName(string $name): Task
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Task
     */
    public function setCreatedAt(?\DateTime $createdAt): Task
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Task
     */
    public function setUpdatedAt(?\DateTime $updatedAt): Task
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDoneAt(): ?\DateTime
    {
        return $this->doneAt;
    }

    /**
     * @param \DateTime $doneAt
     * @return Task
     */
    public function setDoneAt(?\DateTime $doneAt): Task
    {
        $this->doneAt = $doneAt;
        return $this;
    }
}