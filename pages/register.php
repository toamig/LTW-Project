<?php 
    include_once('../database/session.php');
    include_once('../templates/templates.php');

    if(!isset($_SESSION['username'])){
        drawHeader(); 
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="../js/error_utils.js"></script>

    <nav id="content">
        
        <form action="../actions/register_action.php" method="post" id="register-form">
            <p>Register now in Rent-a-house</p>
            <!-- <span>First Name:</span><br> -->
            <input type="text" name="register-firstname" id="register-firstname" required="true" placeholder="First Name"><br>
            <!-- <span>Last Name:</span><br> -->
            <input type="text" name="register-lastname" id="register-lastname" required="true" placeholder="Last Name"><br>
            <!-- <span>User Name:</span><br> -->
            <input type="text" name="register-username" id="register-username" required="true" placeholder="User Name"><br>
            <!-- <span>E-mail:</span><br> -->
            <input type="email" name="register-email" id="register-email" required="true" placeholder="E-mail"><br>
            <!-- <span>Phone Number:</span><br> -->
            <input type="tel" name="register-phoneNumber" id="register-phoneNumber" required="true" placeholder="Phone Number Format: 123-456-7890"><br>
            <!-- <span>Password:</span><br> -->
            <input type="password" name="register-password" id="register-password" required="true" placeholder="Password"><br>
            <!-- <span>Confirm Password:</span><br> -->
            <input type="password" name="register-confirm" id="register-confirm" required="true" placeholder="Confirm your password"><br>

            <div class="form-message"></div>

            <input type="submit" name="register-submit" id="register-submit" value="Register" class="submit"><br>
            <p>Already have an account? <a href="login.php">Sign-in.</a></p>
        </form>

    </nav>

<?php

        drawFooter(); 
            
    }
    else{

        header('Location: home.php');

    }
?>