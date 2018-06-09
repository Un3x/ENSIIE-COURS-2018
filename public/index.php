<?php
include '../module/Application/src/Adapter/DatabaseFactory.php';
include '../module/Todo/src/Repository/Todo.php';
include '../module/Todo/src/Repository/Task.php';
include '../module/Todo/src/Hydrator/Todo.php';
include '../module/Todo/src/Hydrator/Task.php';
include '../module/Todo/src/Entity/Todo.php';
include '../module/Todo/src/Entity/Task.php';

session_start();

$dbAdapter = new \Application\Adapter\DatabaseFactory();

$todoRepository = new \Todo\Repository\Todo();
$taskRepository = new \Todo\Repository\Task();

$todos = $todoRepository->findAll();
foreach ($todos as $todo) {
    $todo->setTasks($taskRepository->findAllByTodo($todo));
}

$view = [
    'todos' => $todos
];

require_once('../view/home.php');