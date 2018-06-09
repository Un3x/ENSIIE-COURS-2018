<?php
include '../module/Application/src/Adapter/DatabaseFactory.php';
include '../module/Todo/src/Repository/Todo.php';
include '../module/Todo/src/Repository/Task.php';
include '../module/Todo/src/Hydrator/Todo.php';
include '../module/Todo/src/Hydrator/Task.php';
include '../module/Todo/src/Entity/Todo.php';
include '../module/Todo/src/Entity/Task.php';

session_start();

header('Content-Type: application/json');

$taskRepository = new \Todo\Repository\Task();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $action = $_POST['action'] ?? null;
    var_dump($action);
    if ($id) {
        $task = $taskRepository->findOne($id);
        switch ($action) {
            case 'validate':
                $task->setDoneAt(new \DateTime());
                break;
            case 'unvalidate':
                $task->setDoneAt(null);
                break;
            default:
                break;
        }
        $taskRepository->update($task);
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

echo json_encode($data);