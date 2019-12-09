<?php

    /*
    * Get function for all the houses present in the database.
    * @return new array with all rental tuples
    */
    function loadAllRental(){
        global $db;
        $stmt = $db->prepare("SELECT * FROM rental");
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

        global $db;
        $stmt = $db->prepare('INSERT INTO user (username, email, password, name, phonenumber) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute(array($username, $email, $password, $name, $phonenumber))?true:false;
    }

    /*
    * Gets all the info from a especific user
    * @param $email, $password
    * @return array()
    */
    function getUser($email, $password){
        global $db;
        $stmt = $db->prepare("SELECT * FROM user WHERE email='".$email."'");
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
