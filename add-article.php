<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once 'includes/head.php' ?>
    <link rel="stylesheet" href="/public/css/add-article.css">
    <title>Créer un article</title>
</head>


<body>
    <div class="container">
        <?php require_once 'includes/header.php' ?>
        <div class="content">
            <div class="block p-20">
                <h1>Ecrire un article </h1>
                <form action="/add-article.php" method="POST">
                    <div class="form-control">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title">
                        <p class="text-error"></p>
                    </div>
                    <div class="form-control">
                        <label for="image">Image</label>
                        <input type="text" name="image" id="image">
                        <p class="text-error"></p>
                    </div>
                    <div class="form-control">
                        <label for="category">Catégorie</label>
                        <select name="category" id="category">
                            <option value="technology">Technologie</option>
                            <option value="nature">Nature</option>
                            <option value="politic">Politique</option>
                        </select>
                        <p class="text-error"></p>

                    </div>
                    <div class="form-control">
                        <label for="content">Contenu</label>
                        <textarea type="text" name="content" id="content"></textarea>
                        <p class="text-error"></p>
                    </div>
                    <div class="form-action">
                        <button class="btn btn-secondary">Annuler</button>
                        <button class="btn btn-primary">Sauvergarder</button>
                    </div>
                </form>

            </div>
        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>

</body>

</html>