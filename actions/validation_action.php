<?php
    include_once('../database/db_utils.php');
    header("Content-Type: application/json");

    $data = json_decode(file_get_contents('php://input'), true);
    print_r($data);
    echo $data["email"];
?>