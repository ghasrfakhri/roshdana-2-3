<?php
require 'include/init.php';

redirectIfUserNotLogin();

$id = $_GET['id'];

$result = $db->query("SELECT * FROM user WHERE id = $id");
$user = $result->fetch_assoc();
var_dump($user);

if (!isset($_SESSION["counted_$id"])) {
    $result = $db->query("UPDATE user SET visit_count=visit_count+1 WHERE id = $id");
    $_SESSION["counted_$id"] = 1;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1><?= $user['firstname'] . " " . $user['lastname'] ?></h1>
Email: <?= $user['email'] ?><br>
Age: <?= $user['age'] ?><br>
<?php
if (file_exists("./images/$user[id].jpg")) {
    ?>
    <img src="./images/<?= $user['id'] ?>.jpg" width="200">
    <?php
}
?>
</body>
</html>
