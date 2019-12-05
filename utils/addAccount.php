<?php
    include_once('../database/connection.php');
    include_once('../database/db_utils.php');

    $name = $_GET['firstname']." ".$_GET['lastname'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $phonenumber = $_GET['phonenumber'];
    $password = $_GET['password'];

    if(!createAccount($name, $username, $email, $phonenumber, $password)){
        header('Location: ../pages/register.php');
        ?> <script>alert('ERROR! Unhable to create the account!')</script><?php
    }
?>