<!doctype html>
<html lang="fr">

    <?php include APP_INCLUDES_DIR . "/html_head_tag.php"; ?>

        <body>

            <div class="container py-5">
                <div class="col-lg-12">
                    <?php include APP_INCLUDES_DIR . "/alerts.php"; ?>
                </div>

                <div class="col-lg-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Login</label>
                                    <input type="text" class="form-control" name="login" value="<?= get_session_post_data('login') ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="">Mot de passe</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Connexion</button>
                                </div>
                                <a href="?page=inscription" class="">Inscription</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </body>
</html>