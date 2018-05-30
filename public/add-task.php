<?php
include '../module/Application/src/Adapter/DatabaseFactory.php';
include '../module/Todo/src/Repository/Todo.php';
include '../module/Todo/src/Repository/Task.php';
include '../module/Todo/src/Hydrator/Todo.php';
include '../module/Todo/src/Hydrator/Task.php';
include '../module/Todo/src/Entity/Todo.php';
include '../module/Todo/src/Entity/Task.php';

$taskRepository = new \Todo\Repository\Task();
$taskHydrator = new \Todo\Hydrator\Task();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $todoId = $_POST['todoId'] ?? null;
    $name = $_POST['taskName'] ?? null;
    if ($todoId && $name) {
        $task = $taskHydrator->hydrate(
            [
                'todo_id' => $todoId,
                'name' => $name
            ],
            new \Todo\Entity\Task()
        );
        $taskRepository->create($task);
        $data = [
            'success' => true,
        ];
    } else {
        $data = [
            'success' => false,
        ];
    }
} else {
    throw new \HttpInvalidParamException('Method not allowed', 405);
}

header('Location: index.php');
exit();