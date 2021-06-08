<?php
require 'include/init.php';

$mgs = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $passwordRepeat = $_REQUEST['password_repeat'];

    if ($password != $passwordRepeat) {
        $mgs = "Password and its repeat is not equal";
    } else {
        $mgs = "Registration Complete";
        $hash = sha1($password);
        $query = "INSERT INTO user SET firstname='$firstname', lastname='$lastname', email='$email', password='$hash' ";
        $result = $db->query($query);
        if($result == false){
            echo "Error";
        }
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
<?php
echo $mgs;


?>
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
        Password: <input name="password" type="password">
    </label><br>
    <label>
        repeat Password: <input name="password_repeat" type="password">
    </label><br>

    <input type="submit" value="Add User">
</form>
</body>
</html>
