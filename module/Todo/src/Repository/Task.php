<?php
/**
 * Created by PhpStorm.
 * User: unex
 * Date: 12/05/18
 * Time: 12:32
 */

namespace Todo\Repository;

use Application\Adapter\DatabaseFactory;

/**
 * Class Task
 * @package Todo\Repository
 */
class Task
{
    /**
     * @var \PDO
     */
    protected $dbAdapter;

    /**
     * @var \Todo\Hydrator\Task
     */
    protected $hydrator;

    public function __construct()
    {
        $dbFactory = new DatabaseFactory();
        $this->dbAdapter = $dbFactory->getDbAdapter();
        $this->hydrator = new \Todo\Hydrator\Task();
    }

    public function findAll(): array
    {
        $sql = 'select * from task';
        $tasks = [];
        foreach ($this->dbAdapter->query($sql) as $todoData) {
            $entity = new \Todo\Entity\Task();
            $tasks[] = $this->hydrator->hydrate($todoData, clone $entity);
        }
        return $tasks;
    }

    /**
     * @param \Todo\Entity\Todo $todo
     * @return array
     */
    public function findAllByTodo(\Todo\Entity\Todo $todo): array
    {
        $statement = $this->dbAdapter->prepare('select * from task where todo_id = :todoId');
        $statement->bindParam(':todoId', $todo->getId());
        $statement->execute();

        $tasks = [];
        foreach ($statement->fetchAll() as $todoData) {
            $entity = new \Todo\Entity\Task();
            $tasks[] = $this->hydrator->hydrate($todoData, clone $entity);
        }
        return $tasks;
    }
}