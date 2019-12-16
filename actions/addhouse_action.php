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
	$published = $_POST['published'];
	$address = $_POST['address'];
	$location = $_POST['location'];
	$state = $_POST['state'];
	$postcode = $_POST['postcode'];
    $description = $_POST['description'];
    $title = $_POST['title'];
    $owner = $_SESSION['username'];
    

	$target_dir = "../images/houses/";
	$fileName = basename($_FILES["image"]["name"]);
	$targetFile= $target_dir . $fileName;
	$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

	
    // echo "<script>alert('$fileType'); window.location.replace(\"../pages/addhouse.php\");</script>";	

	$allowTypes = array('jpg','png','jpeg');
	if(in_array($fileType, $allowTypes)){
		move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    	global $db;	
		$stmt = $db->prepare('INSERT INTO house (image, type, room, bathroom, price, published, address, location, state, postcode, description, title, owner) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
		$stmt->execute(array($fileName, $type, $room, $bathroom, $price, $published, $address, $location, $state, $postcode, $description, $title, $owner));
		$message = "House added";
        echo "<script>alert('$message')";// window.location.replace(\"../pages/addhouse.php\");</script>";
	}
	else{
		$message = "ERROR! Insert valid image";
        echo "<script>alert('$message')";// window.location.replace(\"../pages/addhouse.php\");</script>";	
	}

}
else{

	header('Location: ../pages/home.php');

}

?>