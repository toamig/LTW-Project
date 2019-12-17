<?php

    if(isset($_POST['submit'])) {

        include_once('../database/session.php');
        include_once('../database/db_utils.php');
        
        // Parse all relevant inputs.
        $name = $_POST['firstname']." ".$_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        if(!isset($_POST['image'])){
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
            if($user['phoneNumber'] == $phoneNumber){
                $_SESSION['messages'] = array('type' => 'error', 'content' => 'Phone number already in use!');
                $error_flag = true;
            break;
            }
        }

       // If the the parameters evaluated above fail, it returns to the register page again. 
        if($error_flag){ 
            echo "<span class='form-".$_SESSION['messages']['type']."'>".$_SESSION['messages']['content']."</span>";
        }
        //If not, a new account is created.
        else {
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phoneNumber'] = $phoneNumber;
            $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
            $_SESSION['image'] = $image;

            $verifyCreateAcc = createUserAccount();
            
            if(!$verifyCreateAcc){
                $_SESSION['messages'] = array('type' => 'error', 'content' => 'ERROR! Unable to create a new account!');
                echo "<span class='form-".$_SESSION['messages']['type']."'>".$_SESSION['messages']['content']."</span>";
                session_unset();
                session_destroy();
            }
            else{
                $_SESSION['messages'] = array('type' => 'success', 'content' => 'Account successfully created!');
                echo "<span class='form-".$_SESSION['messages']['type']."'>".$_SESSION['messages']['content']."</span>";
            }
        }

    }
    else {
        echo "There was an error!";
        die();
    }
    
?>

<script>

    var registerError = "<?=$error_flag;?>";

    var verifyCreateAcc = "<?=$verifyCreateAcc;?>";

    if(!registerError && verifyCreateAcc){
        window.history.back();
    }
        
</script>