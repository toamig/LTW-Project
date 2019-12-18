<?php 
    include_once('../database/session.php');
    include_once('../templates/templates.php');
    include_once('../database/db_utils.php');

    $username = $_POST['username'];

    $user = getUserUsername($username);

    $name = $user['name'];
    $email = $user['email'];
    $phoneNumber = $user['phoneNumber'];
    $image = $user['image'];

    drawHeader();
?>

<script src="../js/profile_utils.js"></script>

<!-- Main Div -->
<div class="account">

    <?php
        drawSideTabs(); 

        drawProfileDashBoard();

        drawPortfolioDashBoard();
    ?>

    <script>loadFirstTab();</script>
    
</div>

<!-- Side Tabs -->
<?php function drawSideTabs(){ ?>
    <div class="account-side-tabs">

        <div class="account-side-tabs-wrapper">
            <ul>
                <li>
                    <button onclick="changeTab('profile')" name="profile-btn">
                        <svg class="account-side-tabs-logo" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 55 55" style="enable-background:new 0 0 55 55;" xml:space="preserve">
                            <path d="M55,27.5C55,12.337,42.663,0,27.5,0S0,12.337,0,27.5c0,8.009,3.444,15.228,8.926,20.258l-0.026,0.023l0.892,0.752 c0.058,0.049,0.121,0.089,0.179,0.137c0.474,0.393,0.965,0.766,1.465,1.127c0.162,0.117,0.324,0.234,0.489,0.348 c0.534,0.368,1.082,0.717,1.642,1.048c0.122,0.072,0.245,0.142,0.368,0.212c0.613,0.349,1.239,0.678,1.88,0.98 c0.047,0.022,0.095,0.042,0.142,0.064c2.089,0.971,4.319,1.684,6.651,2.105c0.061,0.011,0.122,0.022,0.184,0.033 c0.724,0.125,1.456,0.225,2.197,0.292c0.09,0.008,0.18,0.013,0.271,0.021C25.998,54.961,26.744,55,27.5,55 c0.749,0,1.488-0.039,2.222-0.098c0.093-0.008,0.186-0.013,0.279-0.021c0.735-0.067,1.461-0.164,2.178-0.287 c0.062-0.011,0.125-0.022,0.187-0.034c2.297-0.412,4.495-1.109,6.557-2.055c0.076-0.035,0.153-0.068,0.229-0.104 c0.617-0.29,1.22-0.603,1.811-0.936c0.147-0.083,0.293-0.167,0.439-0.253c0.538-0.317,1.067-0.648,1.581-1 c0.185-0.126,0.366-0.259,0.549-0.391c0.439-0.316,0.87-0.642,1.289-0.983c0.093-0.075,0.193-0.14,0.284-0.217l0.915-0.764 l-0.027-0.023C51.523,42.802,55,35.55,55,27.5z M2,27.5C2,13.439,13.439,2,27.5,2S53,13.439,53,27.5 c0,7.577-3.325,14.389-8.589,19.063c-0.294-0.203-0.59-0.385-0.893-0.537l-8.467-4.233c-0.76-0.38-1.232-1.144-1.232-1.993v-2.957 c0.196-0.242,0.403-0.516,0.617-0.817c1.096-1.548,1.975-3.27,2.616-5.123c1.267-0.602,2.085-1.864,2.085-3.289v-3.545 c0-0.867-0.318-1.708-0.887-2.369v-4.667c0.052-0.52,0.236-3.448-1.883-5.864C34.524,9.065,31.541,8,27.5,8 s-7.024,1.065-8.867,3.168c-2.119,2.416-1.935,5.346-1.883,5.864v4.667c-0.568,0.661-0.887,1.502-0.887,2.369v3.545 c0,1.101,0.494,2.128,1.34,2.821c0.81,3.173,2.477,5.575,3.093,6.389v2.894c0,0.816-0.445,1.566-1.162,1.958l-7.907,4.313 c-0.252,0.137-0.502,0.297-0.752,0.476C5.276,41.792,2,35.022,2,27.5z"/>
                        </svg>
                        Profile
                    </button>
                </li>
                <li>
                    <button onclick="changeTab('portfolio')" name="portfolio-btn">
                        <svg class="account-side-tabs-logo" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                            <path d="M59.407,176.306H44.498v17.114h14.466c5.468,0,10.935-1.41,10.935-8.554C69.899,178.072,65.762,176.306,59.407,176.306z"/>
                            <path d="M285.712,124.727h-31.317l-88.274-76.751c0.495-1.602,0.844-3.269,0.844-5.025c0-9.37-7.595-16.965-16.965-16.965 s-16.965,7.595-16.965,16.965c0,1.756,0.35,3.423,0.844,5.025l-88.274,76.751H14.288c-3.748,0-6.788,3.04-6.788,6.788v135.712 c0,3.748,3.04,6.788,6.788,6.788h271.424c3.748,0,6.788-3.04,6.788-6.788V131.515C292.5,127.767,289.46,124.727,285.712,124.727z M142.761,58.24c2.205,1.039,4.635,1.676,7.239,1.676s5.035-0.637,7.239-1.676l76.482,66.487H66.278L142.761,58.24z M82.17,211.149 c0,7.326,1.933,10.063,1.933,13.056c0,3.352-3.436,5.65-6.788,5.65c-7.938,0-8.56-7.672-8.56-10.236 c0-11.118-2.022-15.614-9.964-15.614H44.498v18.616c0,4.323-2.82,7.233-7.233,7.233c-4.413,0-7.233-2.91-7.233-7.233v-48.962 c0-6.438,3.349-8.47,8.47-8.47h24.081c17.197,0,21.783,9.441,21.783,17.646c0,6.877-4.054,13.671-10.932,15.264v0.173 C80.844,199.326,82.17,204.71,82.17,211.149z M138.886,228.711h-34.669c-5.118,0-8.47-2.032-8.47-8.47v-46.582 c0-6.438,3.352-8.47,8.47-8.47h33.964c4.23,0,7.323,1.237,7.323,5.823c0,4.589-3.092,5.823-7.323,5.823h-27.968V190.6h24.523 c3.8,0,6.794,1.054,6.794,5.557c0,4.496-2.994,5.56-6.794,5.56h-24.523v15.348h28.673c4.24,0,7.326,1.234,7.326,5.823 C146.212,227.474,143.125,228.711,138.886,228.711z M211.317,220.853c0,5.733-2.474,9.002-8.563,9.002 c-4.586,0-6.089-0.971-7.938-3.881l-25.145-39.698h-0.176v36.611c0,4.669-2.644,6.967-6.967,6.967s-6.967-2.298-6.967-6.967 v-50.373c0-5.999,2.91-8.47,9.083-8.47c3.003,0,5.65,1.145,7.233,3.792l25.321,40.848h0.173v-37.672 c0-4.679,2.647-6.967,6.977-6.967c4.323,0,6.97,2.289,6.97,6.967V220.853z M268.122,177.367h-13.671v45.255 c0,4.323-2.83,7.233-7.233,7.233c-4.416,0-7.236-2.91-7.236-7.233v-45.255h-13.678c-4.141,0-7.502-2.125-7.502-6.089 c0-3.974,3.361-6.089,7.502-6.089h41.819c4.147,0,7.5,2.115,7.5,6.089C275.622,175.242,272.27,177.367,268.122,177.367z"/>
                        </svg>
                        Portfolio
                    </button>
                </li>
            </ul>
        </div>

    </div>
<?php } ?>

<!-- Profile -->
<?php function drawProfileDashBoard(){ ?>
    <div class="account-dash-board" id="profile">

        <ul class="account-dash-board-items">

            <h3 class="account-dash-board-title border-gray">Profile</h3>

            <div class="account-dash-board-wrapper">

                <?php $user = getUserEmail($email); ?>

                <!-- Profile picture -->
                <div class="account-profile-img border-gray">
                    <img src="../images/users/<?=$image?>" alt="profileLogo">
                    <div class="account-profile-name-change-picture" >
                        <p><?php echo $name; ?></p>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="account-profile-wrapper-personal-information">
                    
                    <!-- Set -->
                    <div id="personal-info-set">

                        <!-- Change Button -->
                        <div class="account-profile-wrapper-personal-information-title">
                            <h4>Personal Information</h4>
                        </div>

                        <div class="account-profile-wrapper-container-personal-info" >
                            
                            <!-- Username -->
                            <div class="account-profile-wrapper-personal-info-row">
                                <div class="account-profile-wrapper-personal-info-row-element">
                                    <span>Username</span>
                                    <label class="element-label" type="text"><?php  echo $username; ?></label>
                                </div>

                                <div class="account-profile-wrapper-personal-info-row-element"></div>
                            </div>
                            
                            <!-- First Name && Last Name -->
                            <div class="account-profile-wrapper-personal-info-row">
                                <?php $pos = strpos ($name, ' '); ?>

                                <div class="account-profile-wrapper-personal-info-row-element">
                                    <span>First Name</span>
                                    <label class="element-label" type="text"><?php  echo substr($name, 0, $pos); ?></label>
                                </div>

                                <div class="account-profile-wrapper-personal-info-row-element">
                                    <span>Last Name</span>
                                    <label class="element-label" type="text"><?php echo substr($name, $pos+1, strlen($name));?></label>
                                </div>
                            </div>

                            <!-- Email && Phone Number -->
                            <div class="account-profile-wrapper-personal-info-row">
                                <div class="account-profile-wrapper-personal-info-row-element">
                                    <span>Email</span>
                                    <label class="element-label" type="text"><?php echo $email;?></label>
                                </div>

                                <div class="account-profile-wrapper-personal-info-row-element">
                                    <span>Phone Number</span>
                                    <label class="element-label" type="text"><?php echo substr($phoneNumber,  0, strlen($phoneNumber));?></label>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </ul>

    </div>
<?php } ?>

<!-- Portfolio -->
<?php function drawPortfolioDashBoard(){?>

    <div class="account-dash-board" id="portfolio">

        <ul class="account-dash-board-items">
            <h4 class="account-dash-board-title border-gray">Portfolio</h4>
            
            <div class="account-dash-board-wrapper">

                <div class="portfolio-element border-gray">
                    <?php onwedHouses(); ?>
                </div>

                <div class="portfolio-element">
                    <?php rentedHouses(); ?>
                </div>

            </div>
            
        </ul>

    </div>

<?php } ?>

<?php function onwedHouses(){ ?>
    <h4>Owned Houses</h4>
    <div class="houses-wrapper">
        <?php
            $houses = getUserOwnedHouses($username);

            if(sizeof($houses)){
                foreach($houses as $item){
                    ?> 
                    <form action="house.php" method="get">
                        <input type="hidden" name="id" value="<?=$item['id']?>">
                        <button class="account-btn" type="submit">
                            <?php ownedItem($item); ?>
                        </button> 
                    </form>
                    <?php
                }
            }
        ?>
    </div>
<?php } ?>

<?php function ownedItem($item){ 
    $images = getHouseImages($item['id']);
    ?>
    
    <img class="item-house-img" src="../images/houses/<?php echo $images[0]['image'];?>" alt="HouseImg">
    <h3><?php echo $item['title']; ?></h3>
<?php } ?>

<?php function rentedHouses() { ?>
    <h4>Rented Houses</h4>
    <div class="houses-wrapper">
        <?php
            $houses = getUserRentedHouses($username);

            if(sizeof($houses)){
                foreach($houses as $item){
                    ?> 
                    <form action="house.php" method="get">
                        <input type="hidden" name="id" value="<?=$item['id']?>">
                        <button class="account-btn" type="submit">
                            <?php rentedItem($item); ?>
                        </button> 
                    </form>
                    <?php
                }
            }
        ?>
    </div>
<?php } ?>

<?php function rentedItem($item){ ?>
    <?php $images = getHouseImages($item['houseID']); ?>
    <?php $house = getHouse($item['houseID']);?>
    <img class="item-house-img" src="../images/houses/<?php echo $images[0]['image'];?>" alt="HouseImg">
    <h3><?php echo $house['title']; ?></h3>
<?php } ?>

<!-- Footer -->
<?php drawFooter(); ?>