<?php
/**
 * Created by PhpStorm.
 * User: unex
 * Date: 09/06/18
 * Time: 15:57
 */

namespace User\Repository;

use Application\Adapter\DatabaseFactory;

class User
{

    public function __construct()
    {
        $dbFactory = new DatabaseFactory();
        $this->dbAdapter = $dbFactory->getDbAdapter();
        $this->hydrator = new \User\Hydrator\User();
    }

    /**
     * @param $userId
     * @return null|\User\Entity\User
     */
    public function findOneById($userId)
    {
        $user = null;
        $statement = $this->dbAdapter->prepare('select * from "user" where id = :id');
        $statement->bindParam(':id', $userId);
        $statement->execute();

        foreach ($statement->fetchAll() as $userData) {
            $entity = new \User\Entity\User();
            $user = $this->hydrator->hydrate($userData, clone $entity);
        }

        return $user;
    }

    /**
     * @param $nickname
     * @return null|\User\Entity\User
     */
    public function findOneByNickname($nickname)
    {
        $user = null;
        $statement = $this->dbAdapter->prepare('select * from "user" where nickname = :nickname');
        $statement->bindParam(':nickname', $nickname);
        $statement->execute();

        foreach ($statement->fetchAll() as $userData) {
            $entity = new \User\Entity\User();
            $user = $this->hydrator->hydrate($userData, clone $entity);
        }

        return $user;
    }

    public function create (\User\Entity\User $user)
    {
        $taskArray = $this->hydrator->extract($user);
        $statement = $this->dbAdapter->prepare('INSERT INTO "user" (nickname, password) values (:nickname, :password)');
        $statement->bindParam(':nickname', $taskArray['nickname']);
        $statement->bindParam(':password', $taskArray['password']);
        $statement->execute();
    }

}