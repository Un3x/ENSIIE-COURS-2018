<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Todo List'IIe</title>
    <link rel="stylesheet" href="style.css">
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
            <?php foreach ($view as $todoTitle => $todoTask): ?>
                <li class="board-list-item">
                    <div class="board-tile">
                        <div class="board-tile-title">
                            <h4><?php echo $todoTitle ?></h4>
                        </div>
                        <div class="board-tile-details">
                            <ul>
                                <?php foreach ($todoTask as $task): ?>
                                    <li>
                                        <?php echo $task ?>
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
</html>