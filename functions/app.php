<?php

/*Debugger un ou plusieur variable*/
function dumpVars(...$vars)
{
    echo "<pre>";
    foreach ($vars as $key => $var) {
        echo "Variable $key :";
        var_dump($var);
    }
    echo "<pre>";
}

/* Debugger un ou plusieur variable et quitter */
function ddumpVars(...$vars)
{
    dumpVars($vars);
    die();
}
/*
 * Retoune l'url pour une page
 * */
function url_for($page)
{
    return "index.php?page=$page";
}


/**
 * File upload
 * @return mixed string filename or  array  errors.
 */
function uploadFile($file_index,$extensions_autorisees = array('pdf'),$dir = "uploads")
{
    $errors = [];
    // Testons si le fichier a bien été envoyé et s'il n'y a pasd'erreur
    if (isset($_FILES[$file_index]) AND $_FILES[$file_index]['error'] > 0) {
        $errors[] = "Erreur: d'upload d'image par le naviguateur";
    }
    // Testons si le fichier n'est pas trop gros
    if ($_FILES[$file_index]['size'] > MAX_UPLOAD_FILE_SIZE) {
        $errors[] = "Erreur: Taille de l'image d'image";
    }
    if (empty($errors)) {
        // Testons si l'extension est autorisée
        $infosfichier = pathinfo($_FILES[$file_index]['name']);
        $extension_upload = strtolower($infosfichier['extension']);
        if (!in_array($extension_upload, $extensions_autorisees)) {
            $errors[] = "Erreur d'extention  d'image";
        }
    }
    // On peut valider le fichier et le stocker définitivement
    if (!empty($errors)) {
        return $errors;
    } else {
        $file__name = date('d_m_Y_h_m_s');
        move_uploaded_file($_FILES[$file_index]['tmp_name'], "$dir/$file__name.$extension_upload");
        return $file__name.".".$extension_upload;
    }
}

function redirect_to($url){
    header("location:$url");
    exit();
}

