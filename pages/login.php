<?php 
    include_once('../database/session.php');
    include_once('../templates/templates.php');
    
    if(!isset($_SESSION['username'])){
        drawHeader(); 
?>

    <script src="../js/error_utils.js"></script>

    <nav id="content">
        <form action="../actions/login_action.php" method="post" id="login_form" onsubmit="loginErrorMessage()">
            <p>Login to Rent-a-house</p>
            <input type="email" name="email" id="email" required="true" placeholder="E-mail"><br>
            <!-- <span>Phone Number:</span><br> -->
            <input type="password" name="password" id="password" required="true" placeholder="Password"><br>
            <!-- <span>Confirm Password:</span><br> -->
            
            <?php if(isset($_SESSION['messages'])) {?>

                <div id="error"><?=$_SESSION['messages']['content']?></div>

                <?php
                unset($_SESSION['messages']);

            }?>

            <input type="submit" name="submit-login" value="Sign-in" id="submit"><br>
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