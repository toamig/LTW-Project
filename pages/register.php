<?php 
    include_once('../templates/templates.php');
    drawHeader();
?>

    <nav id="content">
        
        <form action="../utils/verifyRegister.php" method="post" id="register_form">
            <p>Register now in House for rent</p>
            <!-- <span>First Name:</span><br> -->
            <input type="text" name="firstname" id="firstname" required="true" placeholder="First Name"><br>
            <!-- <span>Last Name:</span><br> -->
            <input type="text" name="lastname" id="lastname" required="true" placeholder="Last Name"><br>
            <!-- <span>User Name:</span><br> -->
            <input type="text" name="username" id="username" required="true" placeholder="User Name"><br>
            <!-- <span>E-mail:</span><br> -->
            <input type="email" name="email" id="email" required="true" placeholder="E-mail"><br>
            <!-- <span>Phone Number:</span><br> -->
            <input type="tel" name="phonenumber" id="phonenumber" required="true" placeholder="Phone Number Format: 123-456-7890"><br>
            <!-- <span>Password:</span><br> -->
            <input type="password" name="password" id="password" required="true" placeholder="Password"><br>
            <!-- <span>Confirm Password:</span><br> -->
            <input type="password" name="confirm-password" id="confirm-password" required="true" placeholder="Confirm your password"><br>
            <input type="submit" name="submit" value="Register" id="submit"><br>
            <p>Already have an account? <a href="login.php">Sign-in.</a></p>
        </form>
    </nav>

<?php
    drawFooter(); 
?>