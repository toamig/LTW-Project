<?php 
    include_once('../database/session.php');
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

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Houses for rent</title>

            <link href="../images/icon.png" rel="icon">

            <link href="../css/style.css" rel="stylesheet">
            <link href="../css/responsive.css" rel="stylesheet">

        </head>

        <body>

            <header>

                <div id="title">

                    <a href="../pages/home.php"><h1>Houses for rent</h1></a>

                </div>

                <!-- If a session was not yet started. -->
                <?php if (!isset($_SESSION['username'])){ ?>

                    <div id="signup">

                        <a href="../pages/register.php">Register</a>

                        <a href="../pages/login.php">Login</a>

                    </div>
                
                <!-- If the user has already register or loged in. -->
                <?php } else { ?>

                    <div id="taskbar">
                        <div>
                            <img src="../images/profileLogo.svg" width="20px">
                        </div>
                        
                        <a href="../pages/account.php"><?php echo $_SESSION['username'];?></a>

                    </div>

                <?php } ?>

            </header>

<?php } ?>

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