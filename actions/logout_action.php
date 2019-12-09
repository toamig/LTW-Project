<?php
    include_once('../database/session.php');

    session_unset();
    session_destroy();

    header('Location: ../pages/home.php');
?>