<?php
$pdo = require_once './database/database.php';

$sessionId = $_COOKIE['session'];
if ($sessionId) {
      $statement = $pdo->prepare('DELETE FROM session WHERE  id=:id');
      $statement->bindValue(':id', $sessionId);
      $statement->execute();
      setcookie('session', '', time() - 1);
      header('Location: /auth-login.php');
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
      <?php require_once 'includes/head.php' ?>
      <link rel="stylesheet" href="/public/css/profile.css">
      <title>Logout</title>
</head>

<body>
      <div class="container">
            <?php require_once 'includes/header.php' ?>
            <div class="content">
            </div>
            <?php require_once 'includes/footer.php' ?>
      </div>

</body>

</html>