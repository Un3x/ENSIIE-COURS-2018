<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Todo List'IIe</title>
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
</head>

<body class="background-neutral">
<?php require_once(__DIR__ . '/partials/header.php'); ?>

<div class="section">
    <div class="section-header">
        <h3 class="section-header-name">Todo Lists</h3>
    </div>
    <div class="section-container">
        <form action="add-user.php" method="post">
            <div>
                <label>Nickname</label>
                <input
                    type="text"
                    name="nickname"
                    placeholder="nickname"
                    value="<?php echo $view['user']['nickname'] ?? null ?>"
                >
            </div>
            <div>
                <label>Password</label>
                <input
                    type="text"
                    name="password"
                    placeholder="password"
                    value="<?php echo $view['user']['password'] ?? null ?>"
                >
            </div>
            <div>
                <label>Password verify</label>
                <input
                    type="text"
                    name="password_verify"
                    placeholder="same password"
                    value="<?php echo $view['user']['password_verify'] ?? null ?>"
                >
                <?php if ($view['errors']['password_verify']): ?>
                    <p>
                        <?php echo $view['errors']['password_verify'] ?>
                    </p>
                <?php endif; ?>
            </div>
            <input type="submit" value="Inscription">
        </form>
    </div>
</div>
</body>
</html>