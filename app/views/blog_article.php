
<!doctype html>
<html lang="fr">
<?php include APP_INCLUDES_DIR . "/html_head_tag.php"; ?>
<body>

<?php include APP_INCLUDES_DIR . "/navbar_auth.php"; ?>


<div class="container">

    <div class="col-lg-12">
        <h1>Accueil du blog</h1>
    </div>

    <?php for ($i = 0; $i < 6; $i++): ?>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="index.php?page=blog/article">
                                <img class="img-fluid rounded" src="assets/img/img1.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="card-title">Post Title</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis
                                aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis
                                animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a href="index.php?page=blog/article" class="btn btn-primary">Read More →</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2017 by
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>
        </div>
    <?php endfor ?>

</div>

</body>
</html>