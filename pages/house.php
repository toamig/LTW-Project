<?php 

    include_once('../templates/templates.php');
    include_once('../database/db_utils.php');
    drawHeader(); 

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $house = getHouse($id);

        $owner = getUserUsername($house['owner']); 
        
?>

        <article class="house-body">

            <div id="house-header">

                <div id="house-title">
                
                    <h2><?=$house["title"]?></h2>

                    <p><?=$house["address"].", ".$house["state"].", ".$house["postCode"]?></p>

                </div>

                <div id="house-value">
                
                    <h3>Price:</h3>
                    
                    <p><?=$house["price"]?>$</p>

                </div>

            </div>
            
            <section id="house-image-contact">

                <img  src="../images/houses/<?=$house['image']?>" alt="HouseImg">

                <div id="house-contact-owner">

                    <div id="owner-info">

                        <img src="../images/users/<?=$owner['image']?>" alt="OwnerImg">

                        <a><?=$owner['username']?></a>

                    </div>

                    <form method="post" action="../actions/send_message_action.php">

                        <textarea name="message" cols="auto" rows="auto">Hey, I'd like to get more information about this property. Best regards!</textarea>

                        <input type="submit" name="send-message" value="Send message">

                    </form>

                </div>

            </section>

            <div id="house-info">

                <div id="house-properties">

                    <h3>Properties</h3>

                </div>

                <div id="house-description">

                    <h3>Description</h3>

                    <p><?=$house["description"]?></p>

                </div>

            </div>

        </article>


<?php 

    }else{ 

        header('Location: home.php');

    }

    drawFooter(); 
?>