<?php
    include_once('../database/connection.php');
    include_once('../database/db_utils.php');

    $users = loadAllUser();
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm-password'];

    if($password != $confirm){
        ?> <script>alert('password and its confirmation are not equal!');</script> <?php
        header("Location: ../pages/register.php");
    }

    // For security reasons only these fields are verified. ????
    $error_flag = false;
    foreach($users as $user){
        if($user['username'] == $username){
            $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
            $error_flag = true;
        break;
        }
        if($user['email'] == $email){
            $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
            $error_flag = true;
        break;
        }
        if($user['phoneNumber'] == $phonenumber){
            $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
            $error_flag = true;
        break;
        }
    }

    if($error_flag){ // TBD!
        header("Location: ../pages/register.php");
     ?> <script>alert("<?php $_SESSION['messages'][0]['content']; ?>")</script> <?php
    } 
    else {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
        header("Location: ../utils/addAccount.php");
    }
?>