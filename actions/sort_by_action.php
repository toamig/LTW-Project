<?php
    include_once('../database/db_utils.php');
    header('Content-Type: application/json');

    $results = loadAllRental();

    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['id'];

    $param = $data['param'];

    // echo json_encode($results[$id][$param]);
    echo true;
?>