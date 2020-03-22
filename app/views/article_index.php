<!doctype html>
<html lang="fr">
<?php include APP_INCLUDES_DIR . "/html_head_tag.php"; ?>
<body>
<?php include APP_INCLUDES_DIR . '/navbar_auth.php'; ?>
<div class="container py-5">
    <div class="col-lg-4 mx-auto">
        <?php include APP_INCLUDES_DIR . '/alerts.php'; ?>
    </div>
    <div class="col-lg-12 ">
        <h1>Espace utilisateur</h1>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Liste des articles</div>
            <div class="card-header">
                <a href="<?= url_for("dashboard.articles.create") ?>" class="btn btn-primary">Ajouter </a>
            </div>
            <table class="card-body table">
                <thead>
                <tr>
                    <td>Nom</td>
                    <td>Image</td>
                    <td>Categorie</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $item): ?>
                    <tr>
                        <td><?= $item->title ?></td>
                        <td>
                            <img src="uploads/<?= $item->image ?>" alt="" width="50" height="50">
                        </td>
                        <td><?= $item->c_name ?></td>
                        <td>
                            <a href="<?= url_for("dashboard.articles.edit") ?>&id=<?= $item->id ?>" class="btn btn-primary">Modifier</a>
                            <a href="<?= url_for("dashboard.articles.delete") ?>&id=<?= $item->id ?>" class="btn btn-primary">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>