<?php
$filename = __DIR__ . '/data/articles.json';
$articles = [];
$categories = [];

if (file_exists($filename)) {
    $articles = json_decode(file_get_contents($filename), true) ?? [];
    $cattmp = array_map(fn ($article) => $article['category'], $articles);
    $categories = array_reduce($cattmp, function ($acc, $cat) {
        if (isset($acc[$cat])) {
            $acc[$cat]++;
        } else {
            $acc[$cat] = 1;
        }

        return $acc;
    }, []);
    $articlePerCategories = array_reduce($articles, function ($acc, $article) {
        if (isset($acc[$article['category']])) {
            $acc[$article['category']] = [...$acc[$article['category']], $article];
        } else {
            $acc[$article['category']] = [$article];
        }
        return $acc;
    }, []);
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once 'includes/head.php' ?>
    <link rel="stylesheet" href="/public/css/index.css">
    <title>Blog</title>
</head>

<body>
    <div class="container">
        <?php require_once 'includes/header.php' ?>
        <div class="content">
            <div class="newsfeed-container">

                <ul class="category-container">
                    <li>Tous les articles <span class="small">( <?= count($articles)  ?> )</span></li>


                    <?php foreach ($categories as $catName => $catNum) :  ?>

                        <li><?= $catName ?><span class="small">( <?= $catNum ?> )</span></li>


                    <?php endforeach; ?>




                </ul>


                <div class="newsfeed-container">
                    <?php foreach ($categories as $cat => $num) :     ?>
                        <h2> <?= $cat ?> </h2>
                        <div class="articles-container">
                            <?php foreach ($articlePerCategories[$cat] as $article) : ?>
                                <div class="article block">
                                    <div class="overflow">
                                        <div class="img-container" style="background-image:url(<?= $article['image']  ?>)"></div>
                                        <h3><?= $article['title'] ?>
                                            </h2>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach ?>
                </div>



            </div>

        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>

</body>

</html>