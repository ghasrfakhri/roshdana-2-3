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

function getUserList(){
    global $db;

    $result = $db->query("SELECT user.id, firstname,lastname,title as category FROM `user` LEFT JOIN category ON user.category_id=category.id ");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function login($email, $password){
    global $db;

    $hash = sha1($password);
    $query = "SELECT * FROM user WHERE email='$email' and password='$hash'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        return true;
    } else {
        return false;
    }

}