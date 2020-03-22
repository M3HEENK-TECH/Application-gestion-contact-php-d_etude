<?php

function check_user_logins($login,$password){
    $pdo = getPdo();
    $errors = [];
    $user =  pdo_query($pdo,"SELECT * FROM users WHERE login = ? ",[$login])->fetch();
    if (empty($user)) {
        $errors['login'][] = "Login ou mot de passe incorrect";
        return $errors;
    }
    if ( password_verify($password,$user->password) ) {
        return $user;
    }else{
        $errors['login'][] = "Login ou mot de passe incorrect";
        return $errors;
    }
}


function insert_user($login,$email,$password)  {
    $pdo = getPdo();
    pdo_query($pdo,
        "INSERT INTO users (login,email,password) VALUES(?,?,?)",
        [$login,$email, password_hash($password,PASSWORD_BCRYPT) ]
    );
    $last_id = $pdo->lastInsertId();
    $user = pdo_query($pdo,"SELECT * FROM users WHERE id = $last_id ")->fetch();
    return $user;

}
