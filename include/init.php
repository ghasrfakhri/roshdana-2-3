<?php
session_start();

if(file_exists(__DIR__.'/dev.php')){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $db = new mysqli('localhost', 'root', '', 'roshd2');
}else{
    $db = new mysqli('localhost', 'roshdana_u1', 'W7^P}UkH&72K', 'roshdana_db1');
}
if( $db->connect_errno != 0 ) {
    echo "Connection Error" ;
    exit;
}
require 'functions.php';