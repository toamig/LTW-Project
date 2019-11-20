<?php 
    include_once('../templates/templates.php');
    drawHeader(); 
?>

        <nav id="advertisement">
                <form action="add.php" method="post" id="advertisement">
                    <input type="text" name="title" id="title" required="true" placeholder="Announcement title"><br>
                    <!-- <span>Phone Number:</span><br> -->
                    <input type="number" name="price" id="price" required="true" placeholder="Price"><br>
                    <!-- <span>Confirm Password:</span><br> -->
                    <input type="text" name="address1" required="true" placeholder="Address" id="address"><br>
                    <input type="number" name="addrress2" required="true" placeholder="Number"><br>
                    <input type="text" placeholder="City" required="true" name="City"><br>
                    <input type="text" placeholder="Country"  required="true"name="Country"><br>
                    <textarea rows="5" cols="50" required="true" placeholder="Description"></textarea>
                    <br>
                    <a href="?">Add images from your place.</a>
                </form>
                
        </nav>
    </body>
</html>