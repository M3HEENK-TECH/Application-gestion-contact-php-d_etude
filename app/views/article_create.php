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
            <div class="card-header">Ajouter un article</div>
            <div class="card-body">

                <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <labee>Contenu</labee>
                        <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Categorie</label>
                        <select class="form-control " name="category_id" id="">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Image de l'article</label>
                        <input type="file" name="image" class="form-control form-control-file">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Ajouter</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>