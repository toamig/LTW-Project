<?php
    /* TBD */
    function loadAllRental(){
        global $db;
        $stmt = $db->prepare("SELECT * FROM rental");
        $stmt->execute();
        return $stmt->fetchAll();
    }
?>
