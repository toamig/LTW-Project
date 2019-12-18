<?php 

    include_once('../templates/templates.php');
    include_once('../database/db_utils.php');
    drawHeader(); 

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $house = getHouse($id);

        $owner = getUserUsername($house['owner']);

        $images = getHouseImages($id);
        
        if($house){
        
?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../js/house_utils.js"></script>

        <script src="../js/slideshow.js"></script>

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

                <div id="house-value">
                
                    <h3>Price:</h3>
                    
                    <p><?=$house["price"]?>$</p>

                </div>

            </div>
            
            <section id="house-image-contact">

                <div class="slideshow-container">

                    <?php for($i = 0; $i < count($images); $i++) { ?>

                        <div class="mySlides fade">

                            <img class="slide-image" src="../images/houses/<?=$images[$i]['image']?>">

                        </div>

                    <?php } ?>
                    
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    <div class="dots-container">

                        <?php for($i = 1; $i <= count($images); $i++) { ?>
                            
                            <span class="dot" onclick="currentSlide(<?=$i?>)"></span>

                        <?php } ?>

                    </div>

                </div>

                <div id="house-contact-owner">

                    <div id="owner-info">

                        <img src="../images/users/<?=$owner['image']?>" alt="OwnerImg">

                        <a><?=$owner['username']?></a>

                    </div>

                    <form method="post" onsubmit="sendMessage()">

                            <?php var_dump($owner);?>

                        <textarea id="msg" name="msg" cols="auto" rows="auto" value="Hey, I'd like to get more information about this property. Best regards!">Hey, I'd like to get more information about this property. Best regards!</textarea>
                        <input id="owner-id" type="hidden" name="id" value="<?=$owner['username']?>">
                        <input type="submit" name="send-message" value="Send message">

                    </form>

                </div>

            </section>

            <div id="house-info">

                <div id="house-properties-wrapper">

                    <h3>Properties</h3>

                    <div id="house-properties">

                        <p>Type: <?=$house["type"]?></p>

                        <p>Rooms: <?=$house["room"]?></p>

                        <p>Bathrooms: <?=$house["bathroom"]?></p>

                    </div>

                </div>

                <div id="house-description">

                    <h3>Description</h3>

                    <p><?=$house["description"]?></p>

                </div>

            </div>

            <form action="rental.php">
                    <input type="hidden" name="id" value="<?=$house['id']?>">
                    <input class="utils-btn" type="submit" value="Rent">
            </form>

        </article>


<?php 
        drawFooter(); 

        }
        else{
            header('Location: home.php');
        }
    }
    else{ 
        header('Location: home.php');
    }
?>