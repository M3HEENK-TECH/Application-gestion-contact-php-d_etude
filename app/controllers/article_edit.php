<?php

$categories = fetch_categories();
$article_id = $_GET['id'];
$article = fetch_post($article_id);
if ( !empty($_POST) ) {
    $errors = [];
    if ( empty($_POST['title']) ) {
        $errors['title'][] = "Titre invalid";
    }
    if ( empty($_POST['content']) ) {
        $errors['content'][] = "Contenu invalid";
    }
    if ( empty($_POST['category_id']) ) {
        $errors['category_id'][] = "Categorie  invalide";
    }
    if ( !empty($errors)  ) {
        set_session_errors($errors);
        redirect_to(url_for("dashboard.articles.create"));
    }
    $pdo = getPdo();
    $existTitle = pdo_query($pdo,"SELECT * FROM posts WHERE title = ? AND id != ?",[$_POST['title'],$article_id])->rowCount();
    if ( !empty($existTitle) ) {
        $errors['title'][] = "Titre deja utiliser";
    }
    if ( !empty($_FILES['image']['name']) ) {
        $file_name = uploadFile("image",['png','jpg','jpeg']);
        if ( !is_string($file_name ) ) {
            $errors['image'] = $file_name;
        }
    }
    if ( !empty($errors) ) {
        set_session_errors($errors);
        redirect_to(url_for("dashboard.articles.index"));
    }else{
        $file_name = $file_name??null;
        update_post($_POST['title'],$_POST['content'],$_POST['category_id'],$file_name,$article_id);
        set_session_flash("Article enregistrer avec success");
        redirect_to(url_for("dashboard.articles.index"));
    }

}
