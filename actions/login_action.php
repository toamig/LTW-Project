<?php

    include_once('../database/session.php');
    include_once('../database/db_utils.php');
    header("Content-Type: application/json");


    $request = json_decode(file_get_contents('php://input'), true);

    // parse all relevant inputs.
    $email = $request["email"];
    $password = $request['password'];

    $user = getUserEmail($email);
    $verifyPass = password_verify($password, $user['password']);

    if(!$user){
        $_SESSION['messages'] = array('type' => 'error', 'content' => "Account doesn't exit!");
        echo $_SESSION['messages']['content'];
        die();
    }
    else if($verifyPass){
        $_SESSION['name'] = $user['name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phoneNumber'] = $user['phoneNumber'];
        if($user['image'] != NULL){
            $_SESSION['image'] = $user['image'];
        }

        $_SESSION['messages'] = array('type' => 'error', 'content' => "Successfully logged in!");
        echo $_SESSION['messages']['content'];
        die();
    }
    else{
        $_SESSION['messages'] = array('type' => 'success', 'content' => "Wrong password!");
        echo $_SESSION['messages']['content'];
        die();
    }

    
?>