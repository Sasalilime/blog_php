<?php

$dns = 'mysql:host=localhost;dbname=blog';
$user = 'salim';
$pwd = 'Suits123!!!';

// $user = getenv('DB_USER');
// $pwd = getenv('DB_PWD');



try {
    $pdo = new Pdo(
        $dns,
        $user,
        $pwd,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}


return $pdo;
