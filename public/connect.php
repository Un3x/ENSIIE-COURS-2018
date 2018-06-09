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

session_start();

$userRepository = new \User\Repository\User();
$userHydrator = new \User\Hydrator\User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];

    $view = [
        'user' => [
            'nickname' => $nickname ?? null,
            'password' => $password ?? null,
        ],
        'errors' => [],
    ];

    if ($nickname && $password) {
        $user = $userRepository->findOneByNickname($nickname);
        if (!$user) {
            $view['errors']['user_not_exists'] = 'user does not exist';
        }
        if (password_verify(
                $password,
                $user->getPassword()
        )) {
            $_SESSION['uniqid'] = uniqid();
            $_SESSION['nickname'] = $nickname;
        } else {
            $view['errors']['nickname-password'] = 'Password and nickname do not match';
        }
    } else {
        if (!$nickname) {
            $view['errors']['nickname'] = 'Nickname is required';
        }
        if (!$password) {
            $view['errors']['password'] = 'Password is required';
        }
    }

    if (count($view['errors']) === 0) {
        header('Location: index.php');
    }
}

require_once('../view/connect.php');