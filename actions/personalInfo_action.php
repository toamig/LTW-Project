<?php 

    include_once('../database/session.php');
    include_once('../database/db_utils.php');

    $username = $_POST['username'];

    $pos = strpos ($_SESSION['name'], ' ');

    $firstName = $_POST['firstName'];
    if(empty($firstName)){
        $firstName = substr($_SESSION['name'], 0, $pos);
    }

    $lastName = $_POST['lastName'];
    if(empty($lastName)){
        $lastName = substr($_SESSION['name'], $pos+1, strlen($_SESSION['name']));
    }
    

    $email = $_POST['email'];

    $phoneNumber = $_POST['phoneNumber'];

    $name = $firstName." ".$lastName;

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
        if(updateUserParam($_SESSION['username'], 'username', $username)){
            $_SESSION['username'] = $username;
        }
        if(updateUserParam($_SESSION['username'], 'name', $name)){
            $_SESSION['name'] = $name;
        }
        if(updateUserParam($_SESSION['username'], 'email', $email)){
            $_SESSION['email'] = $email;
        }
        if(updateUserParam($_SESSION['username'], 'phoneNumber', $phoneNumber)){
            $_SESSION['phoneNumber'] = $phoneNumber;
        }
    }

    header("Location: ../pages/account.php");
    die();
?>