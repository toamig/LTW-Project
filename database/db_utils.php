<?php
    include_once('../database/connection.php');

    /*
    * Get function for all the houses present in the database.
    * @return new array with all rental tuples
    */
    function loadAllRental(){
        global $db;
        $stmt = $db->prepare("SELECT * FROM house");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*
    * Get function for all the users present in the database.
    * @return new array with all user tuples
    */
    function loadAllUser(){
        global $db;
        $stmt = $db->prepare("SELECT * FROM user");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*
    * Creates a new account with the session variables previously set.
    * @return true:false
    */
    function createUserAccount(){
        $name = $_SESSION['name'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $phonenumber = $_SESSION['phonenumber'];
        $password = $_SESSION['password'];
        $image = $_SESSION['image'];

        global $db;
        $stmt = $db->prepare('INSERT INTO user (username, email, password, name, phonenumber, image) VALUES (?, ?, ?, ?, ?, ?)');
        return $stmt->execute(array($username, $email, $password, $name, $phonenumber, $image))?true:false;
    }

    function createHouse(){
        
    }
    /*
    * Gets all the info from a specific user
    * @param $email, $password
    * @return array()
    */
    function getUserEmail($email){
        global $db;
        $stmt = $db->prepare("SELECT * FROM user WHERE email='".$email."'");
        $stmt->execute();  
        $aux = $stmt->fetch();
        return $aux;
    }

    /*
    * Gets all the info from a specific user
    * @param $email, $password
    * @return array()
    */
    function getUserUsername($username){
        global $db;
        $stmt = $db->prepare("SELECT * FROM user WHERE username='".$username."'");
        $stmt->execute();  
        $aux = $stmt->fetch();
        return $aux;
    }

    /*
    * Updates the $column info from a specific user to $value
    * @param $username, $column, $value
    * @return boolean
    */
    function updateUserParam($username, $column, $value){
        global $db;
        $stmt = $db->prepare("UPDATE user SET ".$column." = '".$value."' WHERE username='".$username."'");
        return $stmt->execute();
    }

    /*
    * Gets all the info from a specific house
    * @param $email, $password
    * @return array()
    */
    function getHouse($id){
        global $db;
        $stmt = $db->prepare("SELECT * FROM house WHERE id='".$id."'");
        $stmt->execute();  
        $aux = $stmt->fetch();
        return $aux;
    }

    /*
    * Gets all the owned houses from a specific user
    * @param $username
    * @return array()
    */
    function getUserOwnedHouses($username){
        global $db;
        $stmt = $db->prepare("SELECT * FROM house WHERE owner='".$username."'");
        $stmt->execute();  
        $aux = $stmt->fetchAll();
        return $aux;
    }

    /*
    * Gets all the Rented houses from a specific user
    * @param $username
    * @return array()
    */
    function getUserRentedHouses($username){
        global $db;
        $stmt = $db->prepare("SELECT * FROM rental WHERE username='".$username."'");
        $stmt->execute();  
        $aux = $stmt->fetchAll();
        return $aux;
    }

    /*
    * Closes the connection to the database
    */
    function closeConnection(){
        global $db;
        $db->close();
    }
?>
