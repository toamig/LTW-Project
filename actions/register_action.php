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
        $image = $_POST['image'];
        if(is_null($image)){
            $image = 'placeholder.png';
        }

        $error_flag = false;

        // Verify if the password and the confirm password fields are equal.
        if($password != $confirm){
            $_SESSION['messages'] = array('type' => 'error', 'content' => 'Password and its confirmation are not equal!');
            $error_flag = true;
        }

        // Load all the users info from database.
        $users = loadAllUser();

        // For security reasons only these fields are verified.
        foreach($users as $user){
            if($user['username'] == $username){
                $_SESSION['messages'] = array('type' => 'error', 'content' => 'Username already in use!');
                $error_flag = true;
            break;
            }
            if($user['email'] == $email){
                $_SESSION['messages'] = array('type' => 'error', 'content' => 'Email already in use!');
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
            die();
        }
        //If not, a new account is created.
        else {
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phonenumber'] = $phonenumber;
            $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
            $_SESSION['image'] = $image;
            
            if(!createUserAccount()){
                session_destroy();
                $_SESSION['messages'] = array('type' => 'error', 'content' => 'ERROR! Unable to create a new account!!');
                header('Location: ../pages/register.php');
                die();
            }
            else header('Location: ../pages/account.php');
        }

    }
    else {

        header('Location: ../index.php');

    }
    
?>