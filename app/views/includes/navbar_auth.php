<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
        <a class="navbar-brand" href="<?= url_for("home") ?>">Blog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="<?= url_for("dashboard.categories.index") ?>">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url_for("dashboard.articles.index") ?>"> Articles</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url_for("logout") ?>">Deconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>