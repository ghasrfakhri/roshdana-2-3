<?php
require 'include/init.php';
$msg = '';


// XSS , SQL Injection
//<script>alert('hackers are here.'); window.location = "http://google.com"</script>;

if (isPostMethod()) {
    $email = $db->real_escape_string($_POST['email']);
    $password = $db->real_escape_string($_POST['password']);

    if (login($email, $password)) {
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
