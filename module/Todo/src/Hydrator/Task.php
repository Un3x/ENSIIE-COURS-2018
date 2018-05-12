<?php
/**
 * Created by PhpStorm.
 * User: unex
 * Date: 12/05/18
 * Time: 12:31
 */

namespace Todo\Hydrator;
use Todo\Entity\Task as TaskEntity;

/**
 * Class Task
 * @package Todo\Hydrator
 */
class Task
{
    /**
     * @param TaskEntity $object
     * @return array
     */
    public function extract(TaskEntity $object): array
    {
        $data = [];
        if ($object->getId()) {
            $data['id'] = $object->getId();
        }

        if ($object->getTodoId()) {
            $data['todo_id'] = $object->getTodoId();
        }

        if ($object->getName()) {
            $data['name'] = $object->getName();
        }

        if ($object->getCreatedAt()) {
            $data['created_at'] = $object->getCreatedAt();
        }

        if ($object->getUpdatedAt()) {
            $data['updated_at'] = $object->getUpdatedAt();
        }

        return $data;
    }

    /**
     * @param array $data
     * @param TaskEntity $emptyEntity
     * @return TaskEntity
     */
    public function hydrate(array $data, TaskEntity $emptyEntity): TaskEntity
    {
        return $emptyEntity
            ->setId($data['id'] ?? null)
            ->setTodoId($data['todo_id'] ?? null)
            ->setName($data['name'] ?? null)
            ->setCreatedAt($data['created_at'] ? new \DateTime($data['created_at']) : null)
            ->setUpdatedAt($data['updated_at'] ? new \DateTime($data['updated_at']) : null);
    }
}