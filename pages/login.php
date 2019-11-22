<?php 
    include_once('../templates/templates.php');
    drawHeader(); 
?>

        <nav id="login">
            <form action="login.php" method="get" id="login_form">
                <input type="email" name="email" id="email" required="true" placeholder="E-mail"><br>
                <!-- <span>Phone Number:</span><br> -->
                <input type="password" name="password" id="password" required="true" placeholder="Password"><br>
                <!-- <span>Confirm Password:</span><br> -->
                <input type="submit" name="submit" value="Sign-in" id="submit_login"><br>
            </form>
            
            <p>Don't have an account? <a href="register.php">Sign-up now.</a></p>
        </nav>

<?php 
    drawFooter(); 
?>