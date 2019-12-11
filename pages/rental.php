<?php 
    include_once('../templates/templates.php');
    include_once('../database/session.php');
    include_once('../database/connection.php');
    include_once('../database/db_utils.php');
    drawHeader(); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $house = getHouse($id);
    }
?>
    <div id="rental">
        <h2><?=$house["title"]?></h2>
        <img src="<?=$house['image']?>">
    </div>

<?php 
    drawFooter(); 
?>