<?php
/**
 * Created by PhpStorm.
 * User: unex
 * Date: 09/06/18
 * Time: 15:53
 */

namespace User\Hydrator;

/**
 * Class User
 * @package User\Hydrator
 */
class User
{

    public function extract(\User\Entity\User $object): array
    {
        $data = [];
        if ($object->getId()) {
            $data['id'] = $object->getId();
        }

        if ($object->getNickname()) {
            $data['nickname'] = $object->getNickname();
        }

        if ($object->getPassword()) {
            $data['password'] = $object->getPassword();
        }

        if ($object->getCreatedAt()) {
            $data['created_at'] = $object->getCreatedAt()->format(\DateTime::ATOM);
        }

        if ($object->getUpdatedAt()) {
            $data['updated_at'] = $object->getUpdatedAt()->format(\DateTime::ATOM);
        }

        return $data;
    }

    public function hydrate(array $data, \User\Entity\User $emptyEntity): \User\Entity\User
    {
        return $emptyEntity
            ->setId($data['id'] ?? null)
            ->setNickname($data['nickname'] ?? null)
            ->setPassword($data['password'] ?? null)
            ->setCreatedAt($data['created_at'] ? new \DateTime($data['created_at']) : null)
            ->setUpdatedAt($data['updated_at'] ? new \DateTime($data['updated_at']) : null);
    }

}