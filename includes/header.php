<header>
    <a href="/" class="logo">Suits Blog</a>
    <ul class="header-menu">
        <li class=<?= $_SERVER['REQUEST_URI'] == '/form-article.php' ? 'active' : '' ?>>
            <a href="/form-article.php">Ecrire un article</a>
        </li>
        <li class=<?= $_SERVER['REQUEST_URI'] == '/auth-register.php' ? 'active' : '' ?>>
            <a href="/auth-register.php">Inscription</a>
        </li>
        <li class=<?= $_SERVER['REQUEST_URI'] == '/auth-login.php' ? 'active' : '' ?>>
            <a href="/auth-login.php">Connexion</a>
        </li>
        <li>
            <a href="/auth-logout.php">Deconnexion</a>
        </li>
        <li class=<?= $_SERVER['REQUEST_URI'] == '/profile.php' ? 'active' : '' ?>>
            <a href="/profile.php">Mon profil</a>
        </li>

    </ul>
</header>