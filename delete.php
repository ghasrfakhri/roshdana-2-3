<?php
require 'include/init.php';
redirectIfUserNotLogin();

$id = $_GET['id'];
$result = $db->query("DELETE FROM user WHERE id = $id");

redirect('index.php');
