<?php
    include_once('connection.php');
    include_once('session.php');

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
        $phoneNumber = $_SESSION['phoneNumber'];
        $password = $_SESSION['password'];
        $image = $_SESSION['image'];

        global $db;
        $stmt = $db->prepare('INSERT INTO user (username, email, password, name, phoneNumber, image) VALUES (?, ?, ?, ?, ?, ?)');
        return $stmt->execute(array($username, $email, $password, $name, $phoneNumber, $image))?true:false;
    }

    /*
    *
    */
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
        if(!empty($value)){
            $sql = "UPDATE user SET ".$column." = '".$value."' WHERE username='".$username."'";
            $stmt = $db->prepare($sql);
            return $stmt->execute();
        }
        else{
            return false;
        }
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
    * Returns a list of houses ordered by param
    * @param $param
    * @return boolean
    */
    function sortHousesBy($param, $direction){
        global $db;
        $sql = "SELECT * FROM house ORDER BY ".$param." ".$direction;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL();
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
    * Gets all the Messages from a specific user
    * @param $username
    * @return array()
    */
    function getMessages($username){
        global $db;
        $stmt = $db->prepare("SELECT * FROM message WHERE sender='".$username."' OR receiver='".$username."'");
        $stmt->execute();  
        $aux = $stmt->fetchAll();
        return $aux;
    }

    /*
    * Inserts a new message into the db.
    * @param $receiver, $msg
    * @return true:false
    */
    function sendMessage($receiver, $msg){
        $sender = $_SESSION['username'];

        global $db;
        $stmt = $db->prepare('INSERT INTO message (id, sender, receiver, message) VALUES (?, ?, ?, ?)');
        return $stmt->execute(array(NULL, $sender, $receiver, $msg))?true:false;
    }

    /*
    * Inserts a new message into the db.
    * @param $receiver, $msg
    * @return true:false
    */
    function getHouseImages($houseID){
        global $db;
        $stmt = $db->prepare("SELECT * FROM houseimages  WHERE houseID = '".$houseID."'");
        $stmt->execute();
        $aux = $stmt->fetchAll();
        return $aux;
    }

    /*
    * Returns the id of the last inserted house.
    * @return int 
    */
    function lastHouseID(){
        global $db;
        $stmt = $db->prepare('SELECT max(id) FROM house');
        $stmt->execute();
        $aux = $stmt->fetch();
        return $aux;
    }

    /*
    * Deletes all the messages exchanged with a specific user
    * @param username 
    */
    function deleteConversation($username){
        global $db;
        
        $stmt = $db->prepare("DELETE FROM message WHERE sender='".$username."'");
        $stmt->execute();

        $stmt = $db->prepare("DELETE FROM message WHERE receiver='".$username."'");
        $stmt->execute();
    }

    /*
    * Closes the connection to the database
    */
    function closeConnection(){
        global $db;
        $db->close();
    }
?>
