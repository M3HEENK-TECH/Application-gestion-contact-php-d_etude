<?php

function getPdo()
{
    $pdo = new PDO("mysql:host=localhost;dbname=".DB_NAME, DB_USER, DB_PASSWORD, [
        3 => 2,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
    return $pdo;
}


/*
 *
 * Execution d'un requete preparer avec ?
 * */
function pdo_query(PDO $pdo,$query,$params = []) {
    if ( empty($params) ) {
        return $pdo->query($query);
    }else{
        $db  = $pdo->prepare($query);
        $db->execute($params);
        return $db;
    }
}


function crypt_password($password){
    return password_hash($password,PASSWORD_DEFAULT);
}

function check_password($password,$hash){
    return password_verify($password,$hash);
}