<?php
    include_once('../database/db_utils.php');
    $results = loadAllRental();

    $id = $_REQUEST['id'];

    $param = $_REQUEST['param'];

    echo json_encode($results[$id][$param]);
?>