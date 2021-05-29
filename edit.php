<?php
require 'include/init.php';
if(!isset($_SESSION['user'])){
    redirect('login.php');
}
$id = $_GET['id'];

if (isPostMethod()) {
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $age = $_REQUEST['age'];

    $query = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', age='$age' WHERE id=$id ";
    $result = $db->query($query);

    redirect('index.php');
}

$result = $db->query("SELECT * FROM user WHERE id = $id");
$user = $result->fetch_assoc();

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
<form method="post">
    <label>
        Firstname: <input name="firstname" value="<?= $user['firstname'] ?>">
    </label><br>
    <label>
        Lastname: <input name="lastname" value="<?= $user['lastname'] ?>">
    </label><br>
    <label>
        Email: <input name="email" value="<?= $user['email'] ?>">
    </label><br>
    <label>
        age: <input name="age" value="<?= $user['age'] ?>">
    </label><br>

    <input type="submit" value="Edit User">
</form>
</body>
</html>
