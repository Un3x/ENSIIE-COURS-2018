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
        <?php if (!$_SESSION['uniqid']): ?>
        <a class="header-btn header-signup" href="add-user.php">
            Inscription
        </a>
        <a class="header-btn" href="connect.php"    >
            Se connecter
        </a>
        <?php else: ?>
            <span class="header-btn">Welcome, <?php echo $_SESSION['nickname'] ?></span>
            <a class="header-btn" href="disconnect.php"    >
                Se déconnecter
            </a>
        <?php endif; ?>
    </div>
</div>