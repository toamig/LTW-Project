<?php 

    include_once('../database/session.php');
    include_once('../database/db_utils.php');

    $oldPass = $_POST['oldPass'];
    // echo $oldPass.'<br>';

    $user = getUserEmail($email);
    $verifyPass = password_verify($oldPass, $user['password']);

    global $error_flag; 

    // Verify if the old password and the session password fields are equal.
    if(!$verifyPass){
        $_SESSION['messages'] = array('type' => 'error', 'content' => 'Old password and its session password are not equal!');
        $error_flag = true;
    }

    $newPass = $_POST['newPass'];
    // echo $newPass.'<br>';

    $newPassConfirm = $_POST['newPassConfirm'];
    // echo $newPassConfirm.'<br>';

    // Verify if the new password and the new password confirm password fields are equal.
    if($newPass != $newPassConfirm){
        $_SESSION['messages'] = array('type' => 'error', 'content' => 'New password and its confirmation are not equal!');
        $error_flag = true;
    }
    
    // If errors were identified, returns to the account page.
    // Else, updates password and returns to the account page.
    if(!$error_flag)
        global $newPass;
        $newpasshash = password_hash($newPass, PASSWORD_DEFAULT);
        updateUserParam($_SESSION['username'], 'password', $newpasshash);
        $_SESSION['password'] = $newpasshash;
    
    header("Location: ../pages/account.php");
    die();
?>