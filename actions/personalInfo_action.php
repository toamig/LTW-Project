<?php 

    include_once('../database/session.php');
    include_once('../database/db_utils.php');

    $username = $_POST['username'];
    // echo $username.'<br>';

    $name = $_POST['firstName']." ".$_POST['lastName'];
    // echo $name.'<br>';

    $email = $_POST['email'];
    // echo $email.'<br>';

    $phoneNumber = $_POST['phoneNumber'];
    // echo $phoneNumber.'<br>';

    // Load all the users info from database.
    $users = loadAllUser();

    global $error_flag; 

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
        if($user['phoneNumber'] == $phoneNumber){
            $_SESSION['messages'] = array('type' => 'error', 'content' => 'Phone number already in use!');
            $error_flag = true;
        break;
        }
    }   

    if(!$error_flag){
        updateUserParam($_SESSION['username'], 'username', $username);
        $_SESSION['username'] = $username;
        updateUserParam($_SESSION['username'], 'name', $name);
        $_SESSION['name'] = $name;
        updateUserParam($_SESSION['username'], 'email', $email);
        $_SESSION['email'] = $email;
        updateUserParam($_SESSION['username'], 'phoneNumber', $phoneNumber);
        $_SESSION['phoneNumber'] = $phoneNumber;
    }

    header("Location: ../pages/account.php");
    die();
?>