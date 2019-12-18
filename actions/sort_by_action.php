<?php
    include_once('../database/db_utils.php');
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);

    $sort = $data['sort'];

    $array = [];
    $param = "";
    $direction = "";

    switch($sort){
        case "price-high-to-low":
            $param = "price";
            $direction = "DESC";
        break;

        case "price-low-to-high":
            $param = "price";
            $direction = "ASC";
        break;

        case "date-recent-to-older":
            $param = "date";
            $direction = "ASC";
        break;

        case "date-older-to-recent":
            $param = "date";
            $direction = "DESC";
        break;

        case "room-more-to-less":
            $param = "room";
            $direction = "DESC";
        break;

        case "room-less-to-more":
            $param = "room";
            $direction = "ASC";
        break;
    }
    
    $results = sortHousesBy($param, $direction);
    for($i=0; $i < count($results); ++$i){

        $house = array(
            'id' =>   $results[$i]["id"],
            'price' => $results[$i][$param],
        );
        
        $array[$i]  = $house;             
    }

    echo json_encode($array);
?>