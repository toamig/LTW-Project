<?php 
    include_once('../templates/templates.php');
    include_once('../database/connection.php');
    include_once('../database/db_utils.php');
    drawHeader(); 

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $house = getHouse($id);
?>

        <nav class="house-body">

            <h2><?=$house["title"]?></h2>

            <p><?=$house["address"].", ".$house["state"].", ".$house["postCode"]?></p>

            <img src="../images/<?=$house['image']?>" alt="HouseImg">

            <div id="house-info">

                <p>Price: <?=$house["price"]?>$</p>

                    <div id="house-info">

                        <h3>Description</h3>

                        <p><?=$house["description"]?></p>

                    </div>

                <p>advertiser: <a><?=$house["owner"]?></a></p>

            </div>

        </nav>


<?php 

    }else{ 

        header('Location: home.php');

    }

    drawFooter(); 
?>