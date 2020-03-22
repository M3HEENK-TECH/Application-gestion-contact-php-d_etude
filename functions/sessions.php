<?php


function set_session_var($key,$value){
    $_SESSION[$key] = $value;
}

function get_session_var($key){
    return !empty($_SESSION[$key])?? null;
}

function set_session_flash($message,$type = "success"){
    $_SESSION["flashes"][$type] = $message;
}

function get_session_flash(){
    return $_SESSION['flashes'] ?? [];
}

function set_session_errors($message, $type = "success"){
    $_SESSION["errors"] = $message;
}

function get_session_errors(){
    return $_SESSION['errors'] ?? [];
}

function destroy_session_var($key){
    unset($_SESSION[$key]);
}

function destroy_session_errors(){
    unset($_SESSION['errors']);
}


function destroy_session_flashes(){
    unset($_SESSION['flashes']);
}

function set_session_post_data(){
    if ( !empty($_POST) ) {
        set_session_var('_POST',$_POST);
    }
}
function destroy_session_post_data(){
    destroy_session_var('_POST');
}
function get_session_post_data($key = null){
    if (empty($key)){
        return get_session_var('_POST');
    }

    return $_SESSION['_POST'][$key] ??   null;
}


function get_user_session(){
    return $_SESSION['auth.user'] ?? null;
}


function set_user_session($user_data){
    $_SESSION['auth.user'] = $user_data;
}

function destroy_user_session(){
     unset($_SESSION['auth.user']);
}
