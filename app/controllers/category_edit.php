<?php
$pdo = getPdo();
$category = fetch_category($_GET['id']);
if ( !empty($_POST) ){
    $errors = [];

    if ( empty($_POST['name']) ) {
      $errors['name'][] = "Vous devez entrer votre nom";
    }
    if ( empty($_POST['description']) ) {
        $errors['description'][] = "Vous devez entrer une description";
    }
    if ( !empty($errors) ) {
        set_session_errors($errors);
        redirect_to(url_for("dashboard.categories.index"));
    }
    $existName = pdo_query($pdo,"SELECT * FROM categories WHERE name = ?  AND id != ?",[$_POST['name'],$_GET['id']])->rowCount();
    if ( !empty($existName) ) {
        $errors['name'][] = "Nom deja utiliser";
    }
    if ( !empty($errors) ){
        set_session_errors($errors);
        redirect_to(url_for("dashboard.categories.index"));
    }
    if ( empty($errors) ) {
        update_category($_POST['name'],$_POST['description'],$_GET['id']);
        redirect_to(url_for("dashboard.categories.index"));
    }
}