<?php

if(isset($_POST['register'])) {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // include sign up contr class
    include '../controllers/register-ctrl.php';

    $signup = new signUp($name, $email, $password);
    
    $signup->signUser();

}

