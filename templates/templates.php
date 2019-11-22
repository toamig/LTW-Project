<?php 
/**
 * Draws the header for all pages. Receives an username
 * if the user is logged in, in order to draw the logout
 * link.
 */
function drawHeader(){
?>

    <!DOCTYPE html>
    <html lang="en-US">

        <head>

            <meta charset="UTF-8"/>

            <title>Houses for rent</title>

            <link href="../images/icon.png" rel="icon">

            <link href="../css/style.css" rel="stylesheet">

        </head>

        <body>

            <header>

                <div id="title">

                    <a href="home.php"><h1>Houses for rent</h1></a>

                </div>
                
                <div id="signup">

                    <a href="register.php">Register</a>

                    <a href="login.php">Login</a>

                </div>

            </header>
<?php
}?>

<?php 
/**
 * Draws the footer for all pages.
 */
function drawFooter(){
?>
        <footer>

            <p>&copy; Houses for rent, 2018/2019</p>

        </footer>

    </body>

</html>

<?php
}?>