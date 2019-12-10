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
                    <img src="../images/profileLogo.svg" alt="profileLogo">
                    <div class="account-profile-name-change-picture">
                        <?php echo $_SESSION['name']; ?>
                        <button class="account-btn">Change profile picture</button>
                        <!-- <label for="file">Change profile picture</label> -->
                        <!-- <input type="file"> -->
                    </div>
                </div>

                <div class="account-profile-wrapper-personal-information border-gray">

                    <div class="account-profile-wrapper-personal-information-title">
                        <h4>Personal Information</h4>
                        <button class="account-btn">Edit</button>
                    </div>

                    <div class="account-profile-wrapper-container-personal-info">

                        <div class="account-profile-wrapper-personal-info-row">
                            <?php $pos = strpos ($_SESSION['name'], ' '); ?>

                            <div class="account-profile-wrapper-personal-info-row-element">
                                <span>First Name</span>
                                <lable class="element-lable" type="text"><?php  echo substr($_SESSION['name'], 0, $pos); ?></lable>
                            </div>

                            <div class="account-profile-wrapper-personal-info-row-element">
                                <span>Last Name</span>
                                <lable class="element-lable" type="text"><?php echo substr($_SESSION['name'], $pos+1, strlen($_SESSION['name']));?></lable>
                            </div>
                        </div>

                        <div class="account-profile-wrapper-personal-info-row">
                            <div class="account-profile-wrapper-personal-info-row-element">
                                <span>Email</span>
                                <lable class="element-lable" type="text"><?php echo $_SESSION['email'];?></lable>
                            </div>

                            <div class="account-profile-wrapper-personal-info-row-element">
                                <span>Phone Number</span>
                                <lable class="element-lable" type="text"><?php echo substr($_SESSION['phonenumber'],  0, strlen($_SESSION['phonenumber']));?></lable>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="account-profile-wrapper-password-wrapper">

                    <h4 class="account-profile-wrapper-password-wrapper-title">Password</h4>

                    <button class="account-btn">Change Password</button>

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
                <div class="portfolio-wrapper">
                    <?php
                        $houses = getUserHouses($_SESSION['username']);

                        if(sizeof($houses)){
                            foreach($houses as $item){
                                ?> 
                                <button class="account-btn">
                                    <?php ownedItem($item); ?>
                                </button> 
                                <?php
                            }
                        }
                    ?>
                    <button class="account-btn">
                        <div class="account-image-description">
                            <li class="location">
                                    Add new House
                            </li>
                            <li>
                                <img class="add-new-img" src="../images/addNew.svg" alt="AddNewImg">
                            </li>
                        </div>
                    </button>
                </div>
            </div>
        </ul>

    </div>

<?php } ?>

<?php function ownedItem($item){ ?>
    <div class="account-image-description">
        <li class="location">
                <?php echo $item['title']; ?> in <?php echo $item['location']; ?>
        </li>
        <li>
            <img src="../images/<?php echo $item['image'];?>" alt="HouseExampleImg">
        </li>
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