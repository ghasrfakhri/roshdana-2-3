<?php
require 'include/init.php';
if(!isset($_SESSION['user'])){
    redirect('login.php');
}
$id = $_GET['id'];
$result = $db->query("DELETE FROM user WHERE id = $id");

redirect('index.php');
