<?php
if (!empty($_POST)){
    $errors = [];
    if ( empty($_POST['login']) ) {
        $errors['login'][] = 'login invalide';
    }
    if ( empty($_POST['email']) OR !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
        $errors['email'][] = 'email invalide';
    }
    if ( empty($_POST['password']) ) {
        $errors['password'][] = 'mot de passe invalide';
    }
    if ( empty($_POST['password']) AND empty($_POST['password_confirmation']) OR $_POST['password_confirmation'] != $_POST['password']  ) {
        $errors['password'][] = 'Confirmation de mot de passe invalide';
    }
    if (!empty(empty($_POST['password'])) AND strlen($_POST['password']) < 4 ) {
        $errors['password'][] = "Votre mot de passe doit avoir au moins 4 caracteres";
    }
    if ( !empty($errors) ) {
        set_session_errors($errors);
        redirect_to(url_for('inscription'));
    }
    $pdo = getPdo();
    $existLogins  = pdo_query($pdo,"SELECT * FROM users WHERE login = ? ",[$_POST['login']])->rowCount();
    $existEmails  = pdo_query($pdo,"SELECT * FROM users WHERE email = ? ",[$_POST['email']])->rowCount();
    if ( !empty($existLogins) ) {
        $errors['login'][] = "Login deja existant";
    }
    if ( !empty($existEmails) ) {
        $errors['email'][] = "email deja existant" ;
    }
    if ( !empty($errors)) {
        set_session_errors($errors);
        redirect_to(url_for("inscription"));
    }else{
        $user_data  = insert_user($_POST['login'],$_POST['email'],$_POST['password']);
        set_user_session($user_data);
        redirect_to(url_for('home'));
    }

}