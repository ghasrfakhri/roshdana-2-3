<?php
require 'include/init.php';
$msg = '';
if (isPostMethod()) {
    $email = $_POST['email'];
    $hash = sha1($_POST['password']);

    $query = "SELECT * FROM user WHERE email='$email' and password='$hash'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        redirect('index.php');
    } else {
        $msg = "Incorrect Username or Password";
    }

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

<?= $msg ?>
<form method="post">
    <label>
        Email: <input type="email" name="email">
    </label><br>
    <label>
        password: <input type="password" name="password">
    </label><br>
    <input type="submit" value="Login">
</form>

<a href="register.php">Registration</a>
</body>
</html>
