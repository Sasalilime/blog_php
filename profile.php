<?php
require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/database/security.php';
$articleDB = require_once __DIR__ . '/database/models/ArticleDB.php';

$articles = [];
$currentUser = isLoggedIn();
if (!$currentUser) {
      header('Location: /');
}

$articles = $articleDB->fetchUserArticle($currentUser['id']);


?>



<!DOCTYPE html>
<html lang="fr">

<head>
      <?php require_once 'includes/head.php' ?>
      <link rel="stylesheet" href="/public/css/profile.css">
      <title>Mon profil</title>
</head>

<body>
      <div class="container">
            <?php require_once 'includes/header.php' ?>
            <div class="content">
                  <h1>Mon espace</h1>
                  <h2>Mes informations</h2>
                  <div class="info-container">
                        <ul>
                              <li>
                                    <strong>Prénom :</strong>
                                    <p><?= $currentUser['firstname'] ?></p>
                              </li>
                              <li>
                                    <strong>Nom :</strong>
                                    <p><?= $currentUser['lastname'] ?></p>
                              </li>
                              <li>
                                    <strong>Email :</strong>
                                    <p><?= $currentUser['email'] ?></p>
                              </li>
                        </ul>
                  </div>
            </div>
            <?php require_once 'includes/footer.php' ?>
      </div>

</body>

</html>