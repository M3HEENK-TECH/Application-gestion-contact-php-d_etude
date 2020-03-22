<?php
session_start();
include '../configs/app.php';
include '../functions/app.php';
include '../functions/sessions.php';
include '../functions/db.php';
set_session_post_data();


$page = $_GET['page'] ?? null;
$page_controller = "../";
    // Page de login
    if (is_null($page)) {
        if ( !empty(get_user_session() ) ) {
            redirect_to(url_for("home"));
        }
        include "../app/models/user.php";
        include "../app/controllers/index.php";
        include "../app/views/index.php";
    }
    /**
     *************************** *
     * Route d'erreur 404 *****
     * **************************
     */
    else {
        include "../app/views/error404.php";
    }
    destroy_session_post_data();