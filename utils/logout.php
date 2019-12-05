<?php
    include_once('../database/session.php');

    session_destroy();

    header('Location: ../pages/home.php');
?>