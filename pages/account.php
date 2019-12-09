<?php 
    include_once('../database/session.php');
    include_once('../templates/templates.php');
    include_once('../database/connection.php');
    include_once('../database/db_utils.php');

    drawHeader();
?>

<div class="account">

    <?php
        drawSideTabs(); 

        if(isset($_POST['profile-btn'])) drawProfileDashBoard();

        else if(isset($_POST['portfolio-btn'])) drawPortfolioDashBoard();

        else if(isset($_POST['mail-btn'])) drawMailDashBoard();

        else drawProfileDashBoard();
    ?>
        
</div>

<?php function drawSideTabs(){ ?>

    <div class="account-side-tabs">

        <div class="account-side-tabs-wrapper">
            <ul>
                <li>
                    <form method="post">
                        <button type="submit" name="profile-btn">
                            <img class="account-side-tabs-logo" alt="account-side-tabs-logo-profile" src="../images/profileLogo.svg">
                            Profile
                        </button>
                    </form>
                </li>
                <li>
                    <form method="post">
                        <button type="submit" name="portfolio-btn">
                            <img class="account-side-tabs-logo" alt="account-side-tabs-logo-portfolio" src="../images/portfolioLogo.png">
                            Portfolio
                        </button>
                    </form>
                </li>
                <li>
                    <form method="post">
                        <button type="submit" name="mail-btn">
                            <img class="account-side-tabs-logo" alt="account-side-tabs-logo-mail" src="../images/mailLogo.png">
                            Mail
                        </button>
                    </form>
                </li>
                <li>
                    <form>
                        <button formaction="../actions/logout_action.php" class="logout-btn">
                            <img class="account-side-tabs-logo" alt="account-side-tabs-logo-logout" src="../images/LogoutLogo.svg">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>

<?php } ?>

<?php function drawProfileDashBoard(){ ?>

    <div class="account-dash-board">

        <ul class="account-dash-board-items">

            <h4 class="account-dash-board-title border-gray">Profile</h4>

            <div class="account-dash-board-wrapper">

                <div class="account-profile-img border-gray">
                    <img src="../images/profileLogo.svg" alt="profileLogo" height="40px">
                    <?php echo $_SESSION['name']; ?>
                    <label for="file">Change profile picture</label>
                    <!-- <input type="file"> -->
                </div>

                <div class="account-profile-wrapper-personal-information border-gray">

                    <h4 class="account-profile-wrapper-personal-information-title">Personal Information</h4>

                    <div class="account-profile-wrapper-container-personal-info">

                        <div class="account-profile-wrapper-personal-info-row">
                            <span>First Name</span>
                                <input type="text">
                                </input>
                        
                            <span>Last Name</span>
                            <input type="text"></input>
                        </div>

                        <div class="account-profile-wrapper-personal-info-row">
                            <span>Email</span>
                            <input type="text"></input>
    
                            <span>Phone Number</span>
                            <input type="text"></input>
                        </div>

                    </div>

                </div>

                <div class="account-profile-wrapper-password-wrapper">

                    <h4 class="account-profile-wrapper-password-wrapper-title">Password</h4>

                    <button class="account-profile-wrapper-password-wrapper-change-password-btn">Change Password</button>

                </div>

            </div>

        </ul>

    </div>

<?php } ?>

<?php function drawPortfolioDashBoard(){?>
    
    <div class="account-dash-board">

        <ul class="account-dash-board-items">

            <h4 class="account-dash-board-title border-gray">Portfolio</h4>

            <div class="account-dash-board-wrapper">
                <?php 

                    rentalItem(); 
                ?>
            </div>

        </ul>

    </div>

<?php } ?>

<?php function rentalItem(){ ?>
    <div class="image-description">
        <li>
            <img src="../images/<?php echo $item['image'];?>" alt="HouseExampleImg">
        </li>
        <div class="desc-info">
            <li class="location">
                <?php echo $item['title']; ?> in <?php echo $item['location']; ?>
            </li>
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
                        <?php echo date('Y-m-d', $item['date']); ?>
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
        </div>
    </div>

<?php } ?>

<?php function drawMailDashBoard(){?>
    
    <div class="account-dash-board">

        <ul class="account-dash-board-items">

            <h4 class="account-dash-board-title border-gray">Mail</h4>

            <div class="account-dash-board-wrapper">

            </div>

        </ul>

    </div>

<?php } ?>

<?php drawFooter(); ?>