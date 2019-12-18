<?php

if(isset($_POST['submit-delete'])){

	include_once('../database/db_utils.php');
    include_once('../database/session.php');
    
    $id = $_POST['id'];
    $house = getHouse($id);

    $images = getHouseImages($id);

    //for each image
    for($i = 0; $i < count($images); $i++){
        $target_dir = "../images/houses/";
        unlink($target_dir.$images[$i]['image']);
    }
    
    deleteHouseImages($id);
	
	//Deleting house from the database
	deleteHouse($id);

	header('Location: ../pages/account.php');

}
else{

	header('Location: ../pages/home.php');

}
?>