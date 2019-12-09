<?php

    if(isset($_POST['submit-login'])) {

        include_once('../database/session.php');
        include_once('../database/connection.php');
        include_once('../database/db_utils.php');

        // parse all relevant inputs.
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = getUser($email, $password);
        $verifyPass = password_verify($password, $user[0]['password']);

        if(count($user) != 1){
            session_destroy();
            $message = "ERROR! Account doesn't exit!";
            // echo "<script>alert('$message'); window.location.replace(\"../pages/register.php\");</script>";
            header("Location: ../pages/login.php");
            exit(0);
        }
        else if($verifyPass){
            $_SESSION['name'] = $user[0]['name'];
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['phonenumber'] = $user[0]['phonenumber'];

            header('Location: ../pages/home.php');
        }
        else{
            session_destroy();
            $message = "ERROR! Wrong password!";
            // echo "<script>alert('$message'); window.location.replace(\"../pages/register.php\");</script>";
            header("Location: ../pages/login.php");
            exit(0);
        }

    }
    else{

        header("Location: ../index.php");

    }
    
?>