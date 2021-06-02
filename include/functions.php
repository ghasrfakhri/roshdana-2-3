<?php

function isPostMethod(){
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

function redirect($url){
    header("Location: $url");
    exit;
}

function isUserLogin(){
    return isset($_SESSION['user']);
}

function redirectIfUserNotLogin(){
    if(!isUserLogin()){
        redirect('login.php');
    }
}
