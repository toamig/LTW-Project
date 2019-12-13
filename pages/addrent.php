<?php

include_once('../database/session.php');
include_once('../templates/templates.php');

if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
else{
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $house = getHouse($id);

        $owner = getUserUsername($house['owner']); 

    }

drawHeader();
?>

<nav id="content">
        
        <form  method="post" id="addhouse_form" action="../actions/addrent_action.php">
            <p>Add a new house</p>
            <input type="text" name="title" id="title" required="true" placeholder="Title"><br>
            <input type="text" placeholder="Description" name="description" required="true" rows="4" cols="50"></textarea><br>
            <div id="select_box"><select name="type">
                <option>House</option>
                <option>Apartment</option>
                <option>Studio</option>
            </select></div><br>
            <input type="number" name="room" required="true" placeholder="Rooms" min="1"><br>
            <input type="number" name="bathroom" required="true" placeholder="Bathrooms" min="0"><br>
            <input type="number" name="price" id="price" required="true" placeholder="Price - Format: 12345,67" pattern="([0-9]{1,5}),([0-9]{2})" min="10"><br>
            <input type="text" name="address" id="address" required="true" placeholder="Address"><br>
            <input type="text" name="location" id="location" required="true" placeholder="Location"><br>
            <input type="text" name="state" id="state" required="true" placeholder="State"><br>

            <!-- <span>Phone Number:</span><br> -->
            <input type="number" name="postcode" id="postcode" required="true" pattern="([0-9]{4})-([0-9]{3})" placeholder="Post Code - Format: 1234-567"><br>
            <input type="date" name="published" placeholder="Today Date"><br>
            <input type="file" name="image" required="true"><br>
            <input type="submit" name="submit-addhouse" value="Add" id="submit"><br>
            
        </form>

</nav>

<?php
    drawFooter(); 
}
?>