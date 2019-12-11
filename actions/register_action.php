<?php

    if(isset($_POST['submit-register'])){

        include_once('../database/session.php');
        include_once('../database/db_utils.php');
        
        // Parse all relevant inputs.
        $name = $_POST['firstname']." ".$_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm-password'];

        // Verify if the password and the confirm password fields are equal.
        if($password != $confirm){
            $message = "Password and its confirmation are not equal!";
            echo "<script>alert('$message'); window.location.replace(\"../pages/register.php\");</script>";
            exit(0);
        }

        // Load all the users info from database.
        $users = loadAllUser();

        // For security reasons only these fields are verified. ????
        $error_flag = false;
        foreach($users as $user){
            if($user['username'] == $username){
                $_SESSION['messages'] = array('type' => 'error', 'content' => 'Username already in use!');
                $error_flag = true;
            break;
            }
            if($user['email'] == $email){
                $_SESSION['messages'] = array('type' => 'error', 'content' => 'Email alrady in use!');
                $error_flag = true;
            break;
            }
            if($user['phoneNumber'] == $phonenumber){
                $_SESSION['messages'] = array('type' => 'error', 'content' => 'Phone number already in use!');
                $error_flag = true;
            break;
            }
        }

       // If the the parameters evaluated above fail, it returns to the register page again. 
        if($error_flag){ 
            header('Location: ../pages/register.php');
        }
        //If not, a new account is created.
        else {
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phonenumber'] = $phonenumber;
            $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
            if(!createUserAccount()){
                session_destroy();
                $message = "ERROR! Unable to create a new account!";
                echo "<script>alert('$message'); window.location.replace(\"../pages/register.php\");</script>";
                exit(0);
            }
            else header('Location: ../pages/account.php');
        }

    }
    else {

        header('Location: ../index.php');

    }
    
?>