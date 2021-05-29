<?php
require 'include/init.php';
if (!isset($_SESSION['user'])) {
    redirect('login.php');
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $age = $_REQUEST['age'];

    $query = "INSERT INTO user SET firstname='$firstname', lastname='$lastname', email='$email', age='$age' ";
    $result = $db->query($query);

    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];

        if ($image['error'] == UPLOAD_ERR_OK) {
            move_uploaded_file($image['tmp_name'], "./images/".$db->insert_id.".jpg");
        }


    }


    redirect('index.php');
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
<form method="post" enctype="multipart/form-data">
    <label>
        Firstname: <input name="firstname">
    </label><br>
    <label>
        Lastname: <input name="lastname">
    </label><br>
    <label>
        Email: <input name="email">
    </label><br>
    <label>
        age: <input name="age">
    </label><br>
    <input type="file" name="image"><br><br>
    <input type="submit" value="Add User">
</form>
</body>
</html>
