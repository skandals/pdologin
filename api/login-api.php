<?php

if(isset($_POST['login'])) {

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // include sign up contr class
    include '../controllers/login-ctrl.php';

    $login = new validateUser($email, $password);
    
    $login->loginUser();

}
