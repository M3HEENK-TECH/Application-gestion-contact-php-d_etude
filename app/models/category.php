<?php

function fetch_categories()
{
    if (empty($limit) AND empty($offset)) {
        $pdo = getPdo();
        $articles = pdo_query($pdo, "SELECT * FROM categories")->fetchAll();
        return $articles;
    }
    if (!empty($limit) AND !empty($offset)) {
        $pdo = getPdo();
        $articles = pdo_query($pdo, "SELECT * FROM categories LIMIT $limit,$offset")->fetchAll();
        return $articles;
    }
    return null;
}

function fetch_category($id)
{
    $pdo = getPdo();
    $articles = pdo_query($pdo, "SELECT * FROM categories WHERE id = ?",[$id])->fetch();
    return $articles;
}

function insert_category($name,$description)
{
    $pdo = getPdo();
    pdo_query($pdo, "INSERT INTO categories(name,description) values (?,?)", [$name,$description]);
    return $pdo->lastInsertId();
}

function update_category($name,$description,$id)
{
    $pdo = getPdo();
    $errors = [];
    $existName = pdo_query($pdo,"SELECT * FROM categories WHERE name = ? AND id != ? ",[$name,$id])->rowCount();
    if ( !empty($existName) ) {
        $errors['name'][] = "Nom deja utiliser";
    }
    if ( !empty($errors) ) {
        return $errors;
    }
    pdo_query($pdo, "UPDATE categories SET name = ?,description = ? WHERE id = ?", [$name,$description,$id]);
    return $pdo->lastInsertId();
}


function delete_article(int $id)
{
    $pdo = getPdo();
    pdo_query($pdo,
        "DELETE FROM categories WHERE id = ?",
        [$id]);
    return $pdo->lastInsertId();
}