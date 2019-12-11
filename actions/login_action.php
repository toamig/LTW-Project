<?php

    if(isset($_POST['submit-login'])) {

        include_once('../database/session.php');
        include_once('../database/db_utils.php');

        // parse all relevant inputs.
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = getUserEmail($email);
        $verifyPass = password_verify($password, $user['password']);

        if(!$user){
            $_SESSION['messages'] = array('type' => 'error', 'content' => "Account doesn't exit!");
            header("Location: ../pages/login.php");
            exit(0);
        }
        else if($verifyPass){
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phonenumber'] = $user['phoneNumber'];
            if($user['image'] != NULL){
                $_SESSION['image'] = $user['image'];
            }

            header('Location: ../pages/home.php');
        }
        else{
            $_SESSION['messages'] = array('type' => 'error', 'content' => "Wrong password!");
            header("Location: ../pages/login.php");
            exit(0);
        }

    }
    else{

        header("Location: ../index.php");

    }
    
?>