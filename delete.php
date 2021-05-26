<?php
require 'include/init.php';

$id = $_GET['id'];
$result = $db->query("DELETE FROM user WHERE id = $id");

redirect('index.php');
