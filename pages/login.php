<?php 
    include_once('../database/session.php');
    include_once('../templates/templates.php');
    
    if(!isset($_SESSION['username'])){
        drawHeader(); 
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="../js/error_utils.js"></script>

    <nav id="content">
        <form action="../actions/login_action.php" method="post" id="login-form" >
            <p>Login to Rent-a-house</p>
            <input type="email" name="login-email" id="login-email" required="true" placeholder="E-mail"><br>

            <input type="password" name="login-password" id="login-password" required="true" placeholder="Password"><br>
            
            <div class="form-message"></div>

            <input type="submit" name="login-submit" value="Sign-in" id="login-submit" class="submit"><br>
            <p>Don't have an account? <a href="register.php">Sign-up now.</a></p>
        </form>
    </nav>

<?php 

        drawFooter(); 
        
    }
    else{

        header('Location: home.php');

    }
?>