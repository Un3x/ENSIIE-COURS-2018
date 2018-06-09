<?php
include '../module/Application/src/Adapter/DatabaseFactory.php';
include '../module/Todo/src/Repository/Todo.php';
include '../module/User/src/Repository/User.php';
include '../module/Todo/src/Repository/Task.php';
include '../module/Todo/src/Hydrator/Todo.php';
include '../module/User/src/Hydrator/User.php';
include '../module/Todo/src/Hydrator/Task.php';
include '../module/Todo/src/Entity/Todo.php';
include '../module/Todo/src/Entity/Task.php';
include '../module/User/src/Entity/User.php';

$userRepository = new \User\Repository\User();
$userHydrator = new \User\Hydrator\User();

$view = [
    'user' => [],
    'errors' => [],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
    $passwordVerify = $_POST['password_verify'];

    $view['user'] = [
        'nickname' => $nickname ?? null,
        'password' => $password ?? null,
        'password_verify' => $passwordVerify ?? null,
    ];

    if ($nickname && $password && $passwordVerify) {
        if ($password !== $passwordVerify) {
            $view['errors']['password_verify'] = 'Passwords does not match';
        }
    }

    if (count($view['errors']) === 0) {
        $newUser = $userHydrator->hydrate(
            [
                'nickname' => $nickname,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ],
            new \User\Entity\User()
        );
        $userRepository->create($newUser);
        header('Location: index.php');
    }
}

require_once('../view/add-user.php');