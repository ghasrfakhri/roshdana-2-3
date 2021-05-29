<?php
require 'include/init.php';

if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
}

redirect('login.php');