<?php 
    include_once('../templates/templates.php');
    drawHeader(); 
?>

        <nav id="register">
            <p>Register now your place in NAME OF THE WEBSITE</p><br>
            <form action="register.php" method="post" id="register_form">
                <!-- <span>First Name:</span><br> -->
                <input type="text" name="firstname" id="firstname" required="true" placeholder="First Name"><br>
                <!-- <span>Last Name:</span><br> -->
                <input type="text" name="lastname" id="lastname" required="true" placeholder="Last Name"><br>
                <!-- <span>E-mail:</span><br> -->
                <input type="email" name="email" id="email" required="true" placeholder="E-mail"><br>
                <!-- <span>Phone Number:</span><br> -->
                <input type="tel" name="phonenumber" id="phonenumber" required="true" placeholder="Phone Number"><br>
                <!-- <span>Password:</span><br> -->
                <input type="password" name="password" id="password" required="true" placeholder="Password"><br>
                <!-- <span>Confirm Password:</span><br> -->
                <input type="password" name="password" id="confirm" required="true" placeholder="Confirm your password"><br>
                <input type="submit" name="submit" value="Register" id="submit_register"><br>
            </form>
            
            <p>Already have an account? <a href="login.php">Sign-in.</a></p>
        </nav>

<?php 
    drawFooter(); 
?>