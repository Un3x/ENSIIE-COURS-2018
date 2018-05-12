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
 * Class Todo
 * @package Todo\Repository
 */
class Todo
{
    /**
     * @var \PDO
     */
    protected $dbAdapter;

    /**
     * @var \Todo\Hydrator\Todo
     */
    protected $hydrator;

    public function __construct()
    {
        $dbFactory = new DatabaseFactory();
        $this->dbAdapter = $dbFactory->getDbAdapter();
        $this->hydrator = new \Todo\Hydrator\Todo();
    }

    /**
     * @return \Todo\Entity\Todo[]
     */
    public function findAll(): array
    {
        $sql = 'select * from todo';
        $todos = [];
        foreach ($this->dbAdapter->query($sql) as $todoData) {
            $entity = new \Todo\Entity\Todo();
            $todos[] = $this->hydrator->hydrate($todoData, clone $entity);
        }
        return $todos;
    }
}