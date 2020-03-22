<?php

if ( !empty($_POST) ){
    $errors = [];
    if ( empty($_POST['name']) ) {
        $errors['name'][]  = "Vous devez entrer le nom";
    }
    if ( empty($_POST['description']) ) {
        $errors['description'][]  = "Vous devez entrer la description";
    }
    if ( !empty($errors) ) {
        set_session_errors($errors);
        redirect_to(url_for("dashboard.categories.create"));
    }
    $pdo = getPdo();
    $existName = pdo_query($pdo,"SELECT * FROM categories WHERE name = ? ",[$_POST['name']])->rowCount();
    if ( !empty($existName) ) {
        $errors['name'][] = "Nom deja utiliser";
    }
    if (!empty($errors)) {
        set_session_errors($errors);
        redirect_to(url_for("dashboard.categories.create"));
    }
    if (empty($errors)) {
        insert_category($_POST['name'],$_POST['description']);
        set_session_flash("Categories creer avec ");
        redirect_to(url_for("dashboard.categories.create"));
    }

}