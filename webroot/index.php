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
    //Page d'inscription
    elseif ($page == 'inscription') {
        if ( !empty(get_user_session() ) ) {
            redirect_to(url_for("home"));
        }
        include "../app/models/user.php";
        include "../app/controllers/inscription.php";
        include "../app/views/inscription.php";
    }
    //Page d'accueil
    elseif ($page == 'home') {
        if ( empty(get_user_session() ) ) {
            redirect_to("index.php");
        }
        include "../app/models/user.php";
        include "../app/controllers/home.php";
        include "../app/views/home.php";
    }
    //Accueil  du blog
    elseif ($page == 'blog') {
        include "../app/views/blog_article.php";
    }
    //DetailS d'un article
    elseif ($page == 'blog.article') {
        include "../app/views/blog_articles.php";
    }
    //Page de deconnexion
    elseif ($page == 'logout') {
        include "../app/controllers/logout.php";
    }
    /**
     *************************** *
     * Routes des articles *****
     * **************************
     */
    /**  Page de liste d'article  */
    elseif ($page == 'dashboard.articles.index') {
        include "../app/models/article.php";
        include "../app/models/category.php";
        include "../app/controllers/article_index.php";
        include "../app/views/article_index.php";
    }
    /**  Page de creation d'article  */
    elseif ($page == 'dashboard.articles.create') {
        include "../app/models/article.php";
        include "../app/models/category.php";
        include "../app/controllers/article_create.php";
        include "../app/views/article_create.php";
    }
    /**  Page de suppression d'article  */
    elseif ($page == 'dashboard.articles.edit' AND !empty($_GET['id']) AND filter_var($_GET['id'],FILTER_VALIDATE_INT) ) {
        include "../app/models/category.php";
        include "../app/models/article.php";
        include "../app/controllers/article_edit.php";
        include "../app/views/article_edit.php";
    }
    /**  Page de suppression d'article  */
    elseif ($page == 'dashboard.articles.delete') {
        include "../app/models/article.php";
        include "../app/controllers/article_delete.php";
    }
    /**
     *************************** *
     * Routes de categories *****
     * **************************
     */
    elseif ($page == 'dashboard.categories.create') {
        include "../app/models/category.php";
        include "../app/controllers/category_create.php";
        include "../app/views/category_create.php";
    }
    elseif ($page == 'dashboard.categories.index') {
        include "../app/models/category.php";
        include "../app/controllers/category_index.php";
        include "../app/views/category_index.php";
    }
    elseif ($page == 'dashboard.categories.delete' AND !empty($_GET['id']) AND filter_var($_GET['id'],FILTER_VALIDATE_INT) ) {
        include "../app/models/category.php";
        include "../app/controllers/category_delete.php";
    }
    elseif ($page == 'dashboard.categories.edit' AND !empty($_GET['id']) AND filter_var($_GET['id'],FILTER_VALIDATE_INT) ) {
        include "../app/models/category.php";
        include "../app/controllers/category_edit.php";
        include "../app/views/category_edit.php";
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