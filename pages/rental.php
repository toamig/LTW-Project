<?php 
    include_once('../templates/templates.php');
    include_once('../database/session.php');
    include_once('../database/connection.php');
    include_once('../database/db_utils.php');
    drawHeader(); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $house = getHouse($id);
        $owner = getUserUsername($house['owner']); 
    }
?>
    <article class="house-body">
        <div id="house-header">

                <div id="house-title">
                
                    <h2><?=$house["title"]?></h2>

                    <div id="house-location">

                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035 c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719 c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                        </svg>

                        <p><?=$house["address"].", ".$house["state"].", ".$house["postCode"]?></p>

                    </div>

                </div>

                <section id="house-image-contact">

                    <img  src="../images/houses/<?=$house['image']?>" alt="HouseImg">

                    <div id="house-contact-owner">
                    <?php 
                        $priceDay = $house["price"];
                    ?>
                        
                    <div id="rental_info">
                        <br><br><label>Check-in?</label><br><br>
                        <input type="date" name="checkin" id="checkin">
                        <br><br><label>Check-out:</label><br><br>
                        <input type="date" name="checkout" id="checkout">
                        <br><br><?php echo "<button type='button' onclick='date($priceDay)' id='button' class='utils-btn'>";?>Apply</button><br><br>
                        <table id="table">
                            <tr><th>Price:</th><th>$<?=$house["price"]?>/day</th></tr>
                        </table>
                        <br><br><button class="utils-btn">Confirm.</button>
                    </div>

                    </div>

                </section>

        </div>
        
    

    
    </article>
    
    
 
<?php 

    drawFooter(); 
?>