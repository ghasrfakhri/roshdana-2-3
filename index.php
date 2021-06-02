<?php
require 'include/init.php';

redirectIfUserNotLogin();

$users = getUserList();

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
<h1>Hello <?= $_SESSION['user']['firstname']?></h1>
<a href="logout.php">Logout</a>

<a href="add.php">
    add new
</a>
<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Category</th>

    </tr>

    <?php
    $i = 1;
    foreach ($users as $user){
        echo
        "<tr>
            <td>{$i}</td>
            <td>
            <a href='view.php?id={$user['id']}'>$user[firstname] $user[lastname]</a>
            <a style='color: red' href='delete.php?id=$user[id]'>x</a>
            <a style='color: green' href='edit.php?id=$user[id]'>e</a>
            </td>
            <td>
            $user[category]
            </td>
         </tr>";
        $i++;
    }
    ?>

</table>
</body>
</html>
