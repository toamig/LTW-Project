<?php

    include_once('../database/session.php');
    include_once('../database/db_utils.php');

    sendMessage($_GET['receiver'], $_GET['msg']);

?>