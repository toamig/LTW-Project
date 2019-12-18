<?php 
    include_once('../templates/templates.php');
    include_once('../database/db_utils.php');
    drawHeader(); 

    $search = $_GET['search'];

    $result = loadAllRental();
?>

<script src="../js/results_utils.js"></script>

<section id="results">
    <div class="results-header">
        <div>
            <h3>Results for "<?php echo $search; ?>":</h3>
        </div>
        <div class="sort-by">
            <h4>Sort By:</h4>
            <select class="sort-by-select" required onchange="sortBy(this.value)">
                <option value="" disabled selected hidden>-- Select --</option>
                <option value="price-high-to-low">Price: High to Low</option>
                <option value="price-low-to-high">Price: Low to High</option>
                <option value="date-recent-to-older">Date: Recent to Older</option>
                <option value="date-older-to-recent">Date: Older to Recent</option>
                <option value="beds-more-to-less">Beds: More to Less</option>
                <option value="beds-less-to-more">Beds: Less to More</option>
            </select>
            <div class="sort-by-arrow"></div>
        </div>
    </div>

    <div class="results-wrapper">

    <?php
        $resultsFound = false;
        for($i=0; $i<sizeof($result); ++$i){
            $item = $result[$i];
            $counter = 0;
            // Searches for the given input
            if($item['id'] != $search) $counter++;
            if($item['address'] != $search) $counter++;
            if($item['location'] != $search) $counter++;
            if($item['state'] != $search) $counter++;
            if($item['postCode'] != $search) $counter++;
            if($counter == 5) continue;
            $resultsFound = true;

            $images = getHouseImages($item['id']);
    ?>

        <div class="house-item" id="<?php echo $i;?>">
            <form action="house.php">
                <input type="hidden" name="id" value="<?=$item['id']?>">
                <button class="utils-btn" type="submit">
                    <img src="../images/houses/<?php echo $images[0]['image'];?>" alt="HouseExampleImg">
                    <h3><?php echo $item['title']; ?></h3>
                </button>
            </form>
        </div>
        
    <?php } ?>

    </div>

    <?php    
        if(!$resultsFound){ ?>
            <div class="no-results-found">
                <img src="../images/icons/noResultsFound.png" alt="noResultsFound">
            </div>
    <?php } ?>
    
    <div class="new-search">
        <form>
            <button class="new-search-btn" formaction="home.php" formmethod="post">New Search</button>
        </form>
    </div>
    
</section>

<?php 
    drawFooter(); 
?>