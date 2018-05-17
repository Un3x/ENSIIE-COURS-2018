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
<div class="header white">
    <div class="header-container-left">
        <a class="header-link">
            Accueil
        </a>
        <a class="header-link">
            A propos
        </a>
    </div>
    <div class="header-container-right">
        <a class="header-btn header-signup">
            Inscription
        </a>
        <a class="header-btn">
            Se connecter
        </a>
    </div>
</div>
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
                <li class="board-list-item">
                    <div class="board-tile">
                        <div class="board-tile-title">
                            <h4><?php echo $todo->getName() ?></h4>
                        </div>
                        <div class="board-tile-details">
                            <ul>
                                <?php foreach ($todo->getTasks() as $task): ?>
                                    <li>
                                        <?php echo $task->getName() ?>
                                        <span class="icon icon-ok"></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </li>
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
                console.log('it was ok');
            } else {
                console.log('it was removed')
            }
            selectedButton.toggleClass("icon-ok");
            selectedButton.toggleClass("icon-remove");
        });
    });
</script>
</html>