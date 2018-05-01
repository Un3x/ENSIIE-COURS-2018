<?php
$dbh = 'pgsql:user=ensiie;dbname=ensiie;password=test';
$conn = new PDO($dbh);
$sql = 'select todo.name as todoName, task.name as taskName from todo inner join task on todo.id = task.todo_id';

$dbResult = [];
foreach  ($conn->query($sql) as [$todoName, $taskName]) {
    if (!array_key_exists($todoName, $dbResult)) {
        $dbResult[$todoName] = [];
    }
    $dbResult[$todoName][] = $taskName;
}

$view = $dbResult;

require_once('../view/home.php');