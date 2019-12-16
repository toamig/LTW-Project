<?php

if(isset($_POST['submit-profileImg'])){

	include_once('../database/db_utils.php');
    include_once('../database/session.php');
        

    $target_dir = "../images/users/";
	$fileName = basename($_FILES["profileImg"]["name"]);
	$targetFile= $target_dir . $fileName;
	$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

	$allowTypes = array('jpg','png','jpeg');
	if(in_array($fileType, $allowTypes)){
		move_uploaded_file($_FILES["profileImg"]["tmp_name"], $targetFile);
        updateUserParam($_SESSION['username'], 'image', $fileName);
        if($_SESSION['image'] != 'placeholder.png'){
            unlink($target_dir.$_SESSION['image']);
        }
        $_SESSION['image'] = $fileName;
		$message = "Image successfully updated";
        echo "<script>alert('$message')";
        header('Location: ../pages/home.php');
	}
	else{
		$message = "ERROR! Insert valid image";
        echo "<script>alert('$message')";
        header('Location: ../pages/home.php');
    }

}
else{

	header('Location: ../pages/home.php');

}
    
?>