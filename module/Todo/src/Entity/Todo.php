<?php
/**
 * Created by PhpStorm.
 * User: unex
 * Date: 12/05/18
 * Time: 12:31
 */

namespace Todo\Entity;

/**
 * Class Todo
 * @package Todo\Entity
 */
class Todo
{
    /**
     * @var null|integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Todo\Entity\Task[]
     */
    private $tasks;

    /**
     * @var null|\DateTime
     */
    private $createdAt;

    /**
     * @var null|\DateTime
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Todo
     */
    public function setId(int $id): Todo
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \Todo\Entity\Task[]
     */
    public function getTasks(): ?array
    {
        return $this->tasks;
    }

    public function setTasks(array $tasks): Todo
    {
        $this->tasks = $tasks;
        return $this;
    }

    public function isDone()
    {
        if ($this->tasks) {
            /** @var \Todo\Entity\Task $task */
            foreach ($this->tasks as $task) {
                if (!$task->getDoneAt()) {
                    return false;
                }
            }
            return true;
        }
        return false;
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
     * @return Todo
     */
    public function setName(string $name): Todo
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
     * @return Todo
     */
    public function setCreatedAt(\DateTime $createdAt): Todo
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
     * @return Todo
     */
    public function setUpdatedAt(\DateTime $updatedAt): Todo
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}