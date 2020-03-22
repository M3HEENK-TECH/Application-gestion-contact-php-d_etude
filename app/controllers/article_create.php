<?php

    $categories = fetch_categories();
    if ( !empty($_POST) ) {
        $errors = [];
        if ( empty($_POST['title']) ) {
            $errors['title'][] = "Titre invalid";
        }
        if ( empty($_POST['content']) ) {
            $errors['content'][] = "Contenu invalid";
        }
        if ( empty($_POST['category_id']) ) {
            $errors['category_id'][] = "Ctegorie  invalide";
        }
        if ( empty($_FILES['image']['name']) ) {
            $errors['image'][] = "L'image n'est pas correctement uploader";
        }
        if ( !empty($errors)  ) {
            set_session_errors($errors);
            redirect_to(url_for("dashboard.articles.create"));
        }
        $pdo = getPdo();
        $existTitle = pdo_query($pdo,"SELECT * FROM posts WHERE title = ? ",[$_POST['title']])->rowCount();
        if ( !empty($existTitle) ) {
            $errors['title'][] = "Titre deja utiliser";
        }
        $file_name = uploadFile("image",['png','jpg','jpeg']);
        if ( !is_string($file_name ) ) {
            $errors['image'] = $file_name;
        }
        if ( !empty($errors) ) {
            set_session_errors($errors);
            redirect_to(url_for("dashboard.articles.create"));
        }else{
            insert_post($_POST['title'],$_POST['content'],$_POST['category_id'],$file_name);
            set_session_flash("Article enregistrer avec success");
            redirect_to(url_for("dashboard.articles.create"));
        }

    }
