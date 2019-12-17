<?php
    include_once('../database/session.php');
    include_once('../database/db_utils.php');
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);

    $receiver = $data['id'];
    $msg = $data['msg'];

    sendMessage($receiver, $msg);
?>