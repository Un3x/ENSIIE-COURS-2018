<?php
/**
 * Created by PhpStorm.
 * User: unex
 * Date: 12/05/18
 * Time: 12:31
 */

namespace Todo\Hydrator;
use Todo\Entity\Todo as TodoEntity;

/**
 * Class Todo
 * @package Todo\Hydrator
 */
class Todo
{
    /**
     * @param TodoEntity $object
     * @return array
     */
    public function extract(TodoEntity $object): array
    {
        $data = [];
        if ($object->getId()) {
            $data['id'] = $object->getId();
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
     * @param TodoEntity $emptyEntity
     * @return TodoEntity
     */
    public function hydrate(array $data, TodoEntity $emptyEntity): TodoEntity
    {
        return $emptyEntity
            ->setId($data['id'] ?? null)
            ->setName($data['name'] ?? null)
            ->setCreatedAt($data['created_at'] ? new \DateTime($data['created_at']) : null)
            ->setUpdatedAt($data['updated_at'] ? new \DateTime($data['updated_at']) : null);
    }
}