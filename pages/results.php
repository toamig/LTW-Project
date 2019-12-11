<?php 
    include_once('../templates/templates.php');
    include_once('../database/db_utils.php');
    drawHeader(); 

    $search = $_GET['search'];

    $result = loadAllRental();
?>

<section id="results">
    <div class="results-header">
        <div>
            <h3>Results for "<?php echo $search; ?>":</h3>
        </div>
        <div class="sort-by">
            <h4>Sort By:</h4>
            <select class="sort-by-select" required>
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

    <?php
        $resultsFound = false;
        foreach($result as $item){
            $counter = 0;
            // Searches for the given input
            if($item['id'] != $search) $counter++;
            if($item['address'] != $search) $counter++;
            if($item['location'] != $search) $counter++;
            if($item['state'] != $search) $counter++;
            if($item['postCode'] != $search) $counter++;
            if($counter == 5) continue;
            $resultsFound = true;
    ?>
    <div class="wrapper-house">
        <ul class="house-item">
            <h4><?php echo $item['title']; ?> in <?php echo $item['location']; ?></h4>
            <div class="image-description">
                <li>
                    <img src="../images/houses/<?php echo $item['image'];?>" alt="HouseExampleImg">
                </li>
                <div class="desc-info">
                    <li class="description">
                        <?php echo $item['description']; ?>
                    </li>
                    <div class="house-info">
                        <div class="price-info">
                            <h5>Price:</h5>
                            <li class="price-amount">
                            <?php echo $item['price']."$"; ?>
                            </li>
                        </div>
                        <div class="date-info">
                            <h5>Date:</h5>
                            <li class="date">
                                <?php echo $item['published']; ?>
                            </li>
                        </div>
                        <div class="address-info">
                            <h5>Address:</h5>
                            <li class="address">
                                <?php echo $item['address']; ?>
                            </li>
                        </div>
                        <div class="state-info">
                            <h5>State:</h5>
                            <li class="state">
                                <?php echo $item['state']; ?>
                            </li>
                        </div>
                        <div class="postcode-info">
                            <h5>Post Code:</h5>
                            <li class="postcode">
                                <?php echo $item['postCode']; ?>
                            </li>
                        </div>
                    </div>
                    <div class="utils-btn-container">
                        <form action="house.php">
                            <input type="hidden" name="id" value="<?=$item['id']?>">
                            <input class="utils-btn" type="submit" value="Details">
                        </form>
                    </div>
                </div>
            </div>
        </ul>
    </div>
    <?php
        }
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