<?php

    if(isset($_POST['submit'])) {

        include_once('../database/session.php');
        include_once('../database/db_utils.php');

        // parse all relevant inputs.
        $email = $_POST["email"];
        $password = $_POST['password'];

        $user = getUserEmail($email);
        $verifyPass = password_verify($password, $user['password']);

        if(!$user){
            $_SESSION['messages'] = array('type' => 'error', 'content' => "Account doesn't exit!");
            echo "<span class='form-".$_SESSION['messages']['type']."'>".$_SESSION['messages']['content']."</span>";
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
            $_SESSION['messages'] = array('type' => 'success', 'content' => "Successfully logged in!");
            echo "<span class='form-".$_SESSION['messages']['type']."'>".$_SESSION['messages']['content']."</span>";
            die();
        }
        else{
            $_SESSION['messages'] = array('type' => 'error', 'content' => "Wrong password!");
            echo "<span class='form-".$_SESSION['messages']['type']."'>".$_SESSION['messages']['content']."</span>";
            header("Location: ../pages/account.php");
            die();
        }

    }
    else{
        echo "There was an error!";
        die();
    }
    
?>