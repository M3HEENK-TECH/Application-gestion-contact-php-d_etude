<!doctype html>
<html lang="fr">
<?php include APP_INCLUDES_DIR . "/html_head_tag.php"; ?>
<body>
<?php include APP_INCLUDES_DIR.'/navbar_auth.php'; ?>
<div class="container py-5">

    <div class="col-lg-4 mx-auto">
        <?php include APP_INCLUDES_DIR.'/alerts.php'; ?>
    </div>

    <div class="col-lg-12 ">
        <h1>Espace Utilisateur</h1>
    </div>

    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">Liste des categories</div>
            <div class="card-header">
                <a href="<?= url_for("dashboard.categories.create") ?>" class="btn btn-primary">Ajouter</a>
            </div>
            <table class="card-body table">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $item) : ?>
                        <tr>
                            <td><?= $item->name ?></td>
                            <td>
                                <?= $item->description ?>
                            </td>
                            <td>
                                <a href="<?= url_for("dashboard.categories.edit") ?>&id=<?= $item->id  ?>" class="btn btn-primary">Modifer</a>
                                <a href="<?= url_for("dashboard.categories.delete") ?>&id=<?= $item->id  ?>" class="btn btn-primary">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

</body>
</html>