<?php

function fetch_posts($limit = null,$offset =null)
{
    if (empty($limit) AND empty($offset)) {
        $pdo = getPdo();
        $articles = pdo_query($pdo, "SELECT C.name AS c_name,P.* FROM posts P LEFT JOIN categories C ON P.category_id = C.id")->fetchAll();
        return $articles;
    }
    if (!empty($limit) AND !empty($offset)) {
        $pdo = getPdo();
        $articles = pdo_query($pdo, "SELECT C.name AS c_name ,P.* FROM posts P LEFT JOIN categories C ON P.category_id = C.id LIMIT $limit,$offset")->fetchAll();
        return $articles;
    }
    return null;
}

function fetch_post($id){
    $pdo = getPdo();
    $article = pdo_query($pdo, "SELECT C.name AS c_name,C.id AS c_id,P.* FROM posts P LEFT JOIN categories C ON P.category_id = C.id WHERE P.id = ?",[$id])->fetch();
    return $article;
}

function insert_post($title,$content,$category_id,$image_filename)
{
    $pdo = getPdo();
    pdo_query($pdo,
        "INSERT INTO posts(title,content,category_id,image) values (?,?,?,?)",
        [$title, $content, $category_id,$image_filename]);
    return $pdo->lastInsertId();
}


function update_post($title,$content,$category_id,$image_filename, $id)
{
    $pdo = getPdo();
    if ( is_null($image_filename) ){
        pdo_query($pdo,
            "UPDATE  posts SET title = ?,content = ?,category_id = ? WHERE id = ?",
            [$title, $content, $category_id, $id]);
    }else{
        pdo_query($pdo,
            "UPDATE  posts SET title = ?,content = ?,category_id = ?,image = ? WHERE id = ?",
            [$title, $content, $category_id, $image_filename,$id]);
    }
    return true;
}


function delete_post(int $id)
{
    $pdo = getPdo();
    pdo_query($pdo,
        "DELETE FROM posts WHERE id = ?",
        [$id]);
    return $pdo->lastInsertId();
}