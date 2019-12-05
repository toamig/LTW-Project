<?php 
    include_once('../database/session.php');
    include_once('../templates/templates.php');
    include_once('../database/connection.php');
    include_once('../database/db_utils.php');

    drawHeader();

    echo $_SESSION['username'];
?>