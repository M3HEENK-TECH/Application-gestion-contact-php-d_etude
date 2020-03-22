<?php

    if ( !empty($_POST) ){

        if ( empty($_POST['login']) OR empty($_POST['password']) ) {
            set_session_flash("Vous devew remplir tout les champs","danger");
            redirect_to("index.php");
        }
        $user = check_user_logins($_POST['login'],$_POST['password']);
        if ( is_array($user) ) {
            $errors = $user;
            set_session_errors($errors);
            redirect_to("index.php");
        }
        if (is_object($user)) {
            set_user_session($user);
            set_session_flash("Connexino reussie");
            redirect_to(url_for("home"));
        }

    }