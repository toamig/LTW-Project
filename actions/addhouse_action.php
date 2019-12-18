<?php

if(isset($_POST['submit-addhouse'])){
	// $message = "acessed! Unable to create a new account!";
 //    echo "<script>alert('$message'); window.location.replace(\"../pages/register.php\");</script>";
	include_once('../database/db_utils.php');
	include_once('../database/session.php');
	
	$type = $_POST['type'];
	$room = $_POST['room'];
	$bathroom = $_POST['bathroom'];
	$price = $_POST['price'];
	$published = date("m/d/Y");
	$address = $_POST['address'];
	$location = $_POST['location'];
	$state = $_POST['state'];
	$postcode = $_POST['postcode'];
    $description = $_POST['description'];
    $title = $_POST['title'];
    $owner = $_SESSION['username'];
	
	//Adding house to the database

	createHouse($type, $room, $bathroom, $price, $published, $address, $location, $state, $postcode, $description, $title, $owner);
	
	$houseID = lastHouseID();

	//For each image
	$allowedTypes = array('jpg','png','jpeg');
	for($i = 0; $i < count($_FILES["image"]["name"]); $i++){

		$target_dir = "../images/houses/";
		$fileName = basename($_FILES["image"]["name"][$i]);
		$targetFile= $target_dir . $fileName;
		$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

		if(in_array($fileType, $allowedTypes)){
			move_uploaded_file($_FILES["image"]["tmp_name"][$i], $targetFile);
			insertImage($houseID['max(id)'], $fileName);
		}
		else{
			$message = "ERROR! Insert valid image";
			echo "<script>alert('$message')";	
		}
	}

	header('Location: ../pages/house.php?id='.$houseID['max(id)']);
	die();

}
else{

	header('Location: ../pages/home.php');

}
?>