<?php 
    include_once('../database/session.php');
    include_once('../templates/templates.php');
    include_once('../database/db_utils.php');

    drawHeader();

    if(isset($_SESSION['image'])){
        $imgPath = '../images/users/'.$_SESSION['image'];
    }
    else{
        $imgPath = '../images/icons/placeholder.png';
    }
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
                            <svg class="account-side-tabs-logo" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 55 55" style="enable-background:new 0 0 55 55;" xml:space="preserve">
	                            <path d="M55,27.5C55,12.337,42.663,0,27.5,0S0,12.337,0,27.5c0,8.009,3.444,15.228,8.926,20.258l-0.026,0.023l0.892,0.752 c0.058,0.049,0.121,0.089,0.179,0.137c0.474,0.393,0.965,0.766,1.465,1.127c0.162,0.117,0.324,0.234,0.489,0.348 c0.534,0.368,1.082,0.717,1.642,1.048c0.122,0.072,0.245,0.142,0.368,0.212c0.613,0.349,1.239,0.678,1.88,0.98 c0.047,0.022,0.095,0.042,0.142,0.064c2.089,0.971,4.319,1.684,6.651,2.105c0.061,0.011,0.122,0.022,0.184,0.033 c0.724,0.125,1.456,0.225,2.197,0.292c0.09,0.008,0.18,0.013,0.271,0.021C25.998,54.961,26.744,55,27.5,55 c0.749,0,1.488-0.039,2.222-0.098c0.093-0.008,0.186-0.013,0.279-0.021c0.735-0.067,1.461-0.164,2.178-0.287 c0.062-0.011,0.125-0.022,0.187-0.034c2.297-0.412,4.495-1.109,6.557-2.055c0.076-0.035,0.153-0.068,0.229-0.104 c0.617-0.29,1.22-0.603,1.811-0.936c0.147-0.083,0.293-0.167,0.439-0.253c0.538-0.317,1.067-0.648,1.581-1 c0.185-0.126,0.366-0.259,0.549-0.391c0.439-0.316,0.87-0.642,1.289-0.983c0.093-0.075,0.193-0.14,0.284-0.217l0.915-0.764 l-0.027-0.023C51.523,42.802,55,35.55,55,27.5z M2,27.5C2,13.439,13.439,2,27.5,2S53,13.439,53,27.5 c0,7.577-3.325,14.389-8.589,19.063c-0.294-0.203-0.59-0.385-0.893-0.537l-8.467-4.233c-0.76-0.38-1.232-1.144-1.232-1.993v-2.957 c0.196-0.242,0.403-0.516,0.617-0.817c1.096-1.548,1.975-3.27,2.616-5.123c1.267-0.602,2.085-1.864,2.085-3.289v-3.545 c0-0.867-0.318-1.708-0.887-2.369v-4.667c0.052-0.52,0.236-3.448-1.883-5.864C34.524,9.065,31.541,8,27.5,8 s-7.024,1.065-8.867,3.168c-2.119,2.416-1.935,5.346-1.883,5.864v4.667c-0.568,0.661-0.887,1.502-0.887,2.369v3.545 c0,1.101,0.494,2.128,1.34,2.821c0.81,3.173,2.477,5.575,3.093,6.389v2.894c0,0.816-0.445,1.566-1.162,1.958l-7.907,4.313 c-0.252,0.137-0.502,0.297-0.752,0.476C5.276,41.792,2,35.022,2,27.5z"/>
                            </svg>
                            Profile
                        </button>
                    </form>
                </li>
                <li>
                    <form method="post">
                        <button type="submit" name="portfolio-btn">
                            <svg class="account-side-tabs-logo" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                                <path d="M59.407,176.306H44.498v17.114h14.466c5.468,0,10.935-1.41,10.935-8.554C69.899,178.072,65.762,176.306,59.407,176.306z"/>
                                <path d="M285.712,124.727h-31.317l-88.274-76.751c0.495-1.602,0.844-3.269,0.844-5.025c0-9.37-7.595-16.965-16.965-16.965 s-16.965,7.595-16.965,16.965c0,1.756,0.35,3.423,0.844,5.025l-88.274,76.751H14.288c-3.748,0-6.788,3.04-6.788,6.788v135.712 c0,3.748,3.04,6.788,6.788,6.788h271.424c3.748,0,6.788-3.04,6.788-6.788V131.515C292.5,127.767,289.46,124.727,285.712,124.727z M142.761,58.24c2.205,1.039,4.635,1.676,7.239,1.676s5.035-0.637,7.239-1.676l76.482,66.487H66.278L142.761,58.24z M82.17,211.149 c0,7.326,1.933,10.063,1.933,13.056c0,3.352-3.436,5.65-6.788,5.65c-7.938,0-8.56-7.672-8.56-10.236 c0-11.118-2.022-15.614-9.964-15.614H44.498v18.616c0,4.323-2.82,7.233-7.233,7.233c-4.413,0-7.233-2.91-7.233-7.233v-48.962 c0-6.438,3.349-8.47,8.47-8.47h24.081c17.197,0,21.783,9.441,21.783,17.646c0,6.877-4.054,13.671-10.932,15.264v0.173 C80.844,199.326,82.17,204.71,82.17,211.149z M138.886,228.711h-34.669c-5.118,0-8.47-2.032-8.47-8.47v-46.582 c0-6.438,3.352-8.47,8.47-8.47h33.964c4.23,0,7.323,1.237,7.323,5.823c0,4.589-3.092,5.823-7.323,5.823h-27.968V190.6h24.523 c3.8,0,6.794,1.054,6.794,5.557c0,4.496-2.994,5.56-6.794,5.56h-24.523v15.348h28.673c4.24,0,7.326,1.234,7.326,5.823 C146.212,227.474,143.125,228.711,138.886,228.711z M211.317,220.853c0,5.733-2.474,9.002-8.563,9.002 c-4.586,0-6.089-0.971-7.938-3.881l-25.145-39.698h-0.176v36.611c0,4.669-2.644,6.967-6.967,6.967s-6.967-2.298-6.967-6.967 v-50.373c0-5.999,2.91-8.47,9.083-8.47c3.003,0,5.65,1.145,7.233,3.792l25.321,40.848h0.173v-37.672 c0-4.679,2.647-6.967,6.977-6.967c4.323,0,6.97,2.289,6.97,6.967V220.853z M268.122,177.367h-13.671v45.255 c0,4.323-2.83,7.233-7.233,7.233c-4.416,0-7.236-2.91-7.236-7.233v-45.255h-13.678c-4.141,0-7.502-2.125-7.502-6.089 c0-3.974,3.361-6.089,7.502-6.089h41.819c4.147,0,7.5,2.115,7.5,6.089C275.622,175.242,272.27,177.367,268.122,177.367z"/>
                            </svg>
                            Portfolio
                        </button>
                    </form>
                </li>
                <li>
                    <form method="post">
                        <button type="submit" name="mail-btn">
                            <svg class="account-side-tabs-logo" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 299.997 299.997" style="enable-background:new 0 0 299.997 299.997;" xml:space="preserve">
                                <path d="M149.996,0C67.157,0,0.001,67.158,0.001,149.997c0,82.837,67.156,150,149.995,150s150-67.163,150-150 C299.996,67.158,232.835,0,149.996,0z M149.999,52.686l88.763,55.35H61.236L149.999,52.686z M239.868,196.423h-0.009 c0,8.878-7.195,16.072-16.072,16.072H76.211c-8.878,0-16.072-7.195-16.072-16.072v-84.865c0-0.939,0.096-1.852,0.252-2.749 l84.808,52.883c0.104,0.065,0.215,0.109,0.322,0.169c0.112,0.062,0.226,0.122,0.34,0.179c0.599,0.309,1.216,0.558,1.847,0.721 c0.065,0.018,0.13,0.026,0.195,0.041c0.692,0.163,1.393,0.265,2.093,0.265h0.005c0.005,0,0.01,0,0.01,0 c0.7,0,1.401-0.099,2.093-0.265c0.065-0.016,0.13-0.023,0.195-0.041c0.63-0.163,1.245-0.412,1.847-0.721 c0.114-0.057,0.228-0.117,0.34-0.179c0.106-0.06,0.218-0.104,0.322-0.169l84.808-52.883c0.156,0.897,0.252,1.808,0.252,2.749 V196.423z"/>
                            </svg>
                            Messages
                        </button>
                    </form>
                </li>
                <li>
                    <form>
                        <button formaction="../actions/logout_action.php" class="logout-btn">
                            <svg class="account-side-tabs-logo" height="512pt" viewBox="0 0 512.00533 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                                <path d="m320 277.335938c-11.796875 0-21.332031 9.558593-21.332031 21.332031v85.335937c0 11.753906-9.558594 21.332032-21.335938 21.332032h-64v-320c0-18.21875-11.605469-34.496094-29.054687-40.554688l-6.316406-2.113281h99.371093c11.777344 0 21.335938 9.578125 21.335938 21.335937v64c0 11.773438 9.535156 21.332032 21.332031 21.332032s21.332031-9.558594 21.332031-21.332032v-64c0-35.285156-28.714843-63.99999975-64-63.99999975h-229.332031c-.8125 0-1.492188.36328175-2.28125.46874975-1.027344-.085937-2.007812-.46874975-3.050781-.46874975-23.53125 0-42.667969 19.13281275-42.667969 42.66406275v384c0 18.21875 11.605469 34.496093 29.054688 40.554687l128.386718 42.796875c4.351563 1.34375 8.679688 1.984375 13.226563 1.984375 23.53125 0 42.664062-19.136718 42.664062-42.667968v-21.332032h64c35.285157 0 64-28.714844 64-64v-85.335937c0-11.773438-9.535156-21.332031-21.332031-21.332031zm0 0"/>
                                <path d="m505.75 198.253906-85.335938-85.332031c-6.097656-6.101563-15.273437-7.9375-23.25-4.632813-7.957031 3.308594-13.164062 11.09375-13.164062 19.714844v64h-85.332031c-11.777344 0-21.335938 9.554688-21.335938 21.332032 0 11.777343 9.558594 21.332031 21.335938 21.332031h85.332031v64c0 8.621093 5.207031 16.40625 13.164062 19.714843 7.976563 3.304688 17.152344 1.46875 23.25-4.628906l85.335938-85.335937c8.339844-8.339844 8.339844-21.824219 0-30.164063zm0 0"/>
                            </svg>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>

<?php } ?>

<?php function drawProfileDashBoard(){ ?>
    
    <?php global $imgPath; ?>

    <div class="account-dash-board">

        <ul class="account-dash-board-items">

            <h4 class="account-dash-board-title border-gray">Profile</h4>

            <div class="account-dash-board-wrapper">

                <?php $user = getUser($_SESSION['email']); ?>

                <div class="account-profile-img border-gray">
                    <img src=<?=$imgPath ?> alt="profileLogo">
                    <div class="account-profile-name-change-picture" >
                        <?php echo $_SESSION['name']; ?>
                        <form class="account-change-img" action="../actions/upluad_image_action.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="profileImg" class="account-img-btn">
                            <input type="submit" name="submit-profileImg" class="account-btn" value="Change profile picture">
                            <!-- <label for="file">Change profile picture</label> -->
                            <!-- <input type="file"> -->
                        </form>
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
        <ul>
            <?php
                $houses = getUserOwnedHouses($_SESSION['username']);

                if(sizeof($houses)){
                    foreach($houses as $item){
                        ?> 
                        <li>
                            <button class="account-btn">
                                <?php ownedItem($item); ?>
                            </button> 
                        </li>
                        <?php
                    }
                }
            ?>
            <?php addNewBtn();?>
        </ul>
    </div>
    
<?php } ?>

<?php function rentedHouses() { ?>
    <h4>Rented Houses</h4>
    <div class="houses-wrapper">
        <ul>
            <?php
                $houses = getUserRentedHouses($_SESSION['username']);

                if(sizeof($houses)){
                    foreach($houses as $item){
                        ?> 
                        <li>
                            <button class="account-btn">
                                <?php rentedItem($item); ?>
                            </button> 
                        </li>
                        <?php
                    }
                }
            ?>
            <?php addNewBtn();?>
        </ul>
    </div>

<?php } ?>

<?php function ownedItem($item){ ?>
        <ul class="list-item">
            <li class="location">
                    <?php echo $item['title']; ?> in <?php echo $item['location']; ?>
            </li>
            <li>
                <img class="item-house-img" src="../images/houses/<?php echo $item['image'];?>" alt="HouseImg">
            </li>
        </ul>
<?php } ?>

<?php function rentedItem($item){ ?>
        <ul class="list-item">
            <?php $house = getHouse($item['houseID']);?>
            <li class="location">
                    <?php echo $house['title']; ?> in <?php echo $house['location']; ?>
            </li>
            <li>
                <img class="item-house-img" src="../images/houses/<?php echo $house['image'];?>" alt="HouseImg">
            </li>
        </ul>
<?php } ?>

<?php function addNewBtn() { ?>
    <li class="add-new-wrapper">
        <a href="addhouse.php"><button class="add-new-btn">
            <img class="add-new-img" src="../images/icons/addNew.svg" alt="AddNewImg">
        </button></a>
    </li>
<?php } ?>

<?php function drawMailDashBoard() {?>
    
    <div class="account-dash-board">

        <ul class="account-dash-board-items">

            <h4 class="account-dash-board-title border-gray">Messages</h4>

            <div class="account-dash-board-wrapper">

                <?php messageLeftPanel(); ?>

                <?php messageRightPanel(); ?>

            </div>

        </ul>

    </div>

<?php } ?>

<?php function messageLeftPanel() { ?>

    <div class="message-left-panel">
        <div class="self-id">
            <label class="self-name">Name name</label>
            <button class="create-new-message-btn">
                <svg class="create-new-message" height="401pt" viewBox="0 -1 401.52289 401" width="401pt" xmlns="http://www.w3.org/2000/svg">
                    <path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/>
                </svg>
            </button>
        </div>
        <div class="scroll-container">
            <a>Home</a>
            <a>News</a>
            <a>Contact</a>
            <a>About</a>
            <a>Home</a>
            <a>News</a>
            <a>Contact</a>
            <a>About</a>
            <a>Home</a>
            <a>News</a>
            <a>Contact</a>
            <a>About</a>
            <a>Home</a>
            <a>News</a>
            <a>Contact</a>
            <a>About</a>
            <a>Home</a>
            <a>News</a>
            <a>Contact</a>
            <a>About</a>
            <a>Home</a>
            <a>News</a>
            <a>Contact</a>
            <a>About</a>
        </div>
    </div>

<?php } ?>

<?php function messageRightPanel(){ ?>

    <div class="message-right-panel">
        <div class="user-id">
            <img src="../images/users/DenverDebelak.jpeg" alt="userImg">
        </div>
        <div class="chat-container">

        </div>
    </div>

<?php } ?>

<?php drawFooter(); ?>