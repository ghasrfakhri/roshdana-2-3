<?php

function isPostMethod(){
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

function redirect($url){
    header("Location: $url");
    exit;
}