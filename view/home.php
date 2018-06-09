<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Todo List'IIe</title>
    <link rel="stylesheet" href="style.css">
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
</head>

<body class="background-neutral">
<?php require_once(__DIR__ . '/partials/header.php'); ?>
<div class="section">
    <div class="section-header">
        <h3 class="section-header-name">Todo Lists</h3>
    </div>
    <div class="section-container">
        <ul class="board-list">
            <?php
            /** @var \Todo\Entity\Todo $todo */
            foreach ($view['todos'] as $todo):
            ?>
                <?php if (!$todo->isDone()): ?>
                    <li class="board-list-item">
                        <div class="board-tile board-tile--blue">
                            <div class="board-tile-title">
                                <h4><?php echo $todo->getName() ?></h4>
                            </div>
                            <div class="board-tile-details">
                                <ul class="active-todo-container">
                                    <?php foreach ($todo->getTasks() as $task): ?>
                                        <li class="form-container">
                                            <form action="delete-task.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $task->getId() ?>">
                                                <button class="submit-button" type="submit"><span class="icon-delete"></span></button>
                                            </form>
                                            <div>
                                                <?php echo $task->getName() ?>
                                            </div>
                                            <div>
                                                <span id="<?php echo $task->getId() ?>" class="icon <?php echo $task->getDoneAt() ? 'icon-ok': 'icon-remove' ?>"></span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                    <li>
                                        <div>
                                            <form action="add-task.php" method="post">
                                                <input type="hidden" name="todoId" value="<?php echo $todo->getId() ?>">
                                                <div class="form-container">
                                                    <input class="item-input" type="text" name="taskName" placeholder="new task">
                                                    <input class="item-submit" type="submit" value="Ok">
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <ul class="board-list">
            <?php
            /** @var \Todo\Entity\Todo $todo */
            foreach ($view['todos'] as $todo):
                ?>
                <?php if ($todo->isDone()): ?>
                <li class="board-list-item">
                    <div class="board-tile board-tile--green">
                        <div class="board-tile-title">
                            <h4><?php echo $todo->getName() ?></h4>
                        </div>
                        <div class="board-tile-details">
                            <ul>
                                <?php foreach ($todo->getTasks() as $task): ?>
                                    <li>
                                        <?php echo $task->getName() ?>
                                        <span id="<?php echo $task->getId() ?>" class="icon <?php echo $task->getDoneAt() ? 'icon-ok': 'icon-remove' ?>"></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
<script>
    $(document).ready(function(){
        $(".icon").click(function() {
            const selectedButton = $(this);
            if (selectedButton.hasClass("icon-ok")) {
                $.post(
                    'task-status.php',
                    {
                        'id': selectedButton.attr('id'),
                        'action': 'unvalidate'
                    }
                );
            } else {
                $.post(
                    'task-status.php',
                    {
                        'id': selectedButton.attr('id'),
                        'action': 'validate'
                    }
                );
            }
            selectedButton.toggleClass("icon-ok");
            selectedButton.toggleClass("icon-remove");
        });
    });
</script>
</html>