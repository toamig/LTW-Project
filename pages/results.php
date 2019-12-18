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
        <nav id="search" style="background: none; margin-bottom: 15px;">

            <form action="results.php" method="get">

                <input type="search" name="search" placeholder="New Search: Country, city or zip">

                <button type="submit">

                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z"></path>
                    </svg>

                </button>
                
            </form>

        </nav>
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
    
</section>

<?php 
    drawFooter(); 
?>