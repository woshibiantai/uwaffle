<?php
session_start();
$owner = $_SESSION['sess_user'];
if(!isset($_SESSION['sess_user'])){
    header('location:mlogin.php');
} else {
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>uwaffle! :: favorites</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.0.0.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/favorites.css">
    <link rel="stylesheet" type="text/css" href="css/settings.css">

  </head>
  <body>
<div class="container-fluid mainBody">

    
        <div class="row header-row">
            <div class="col-xs-2 burgerBtn-col"></div>
            <div class="col-xs-10 header-col"><a href="index.php"></a></div> 
        </div>
    
    <div class="row fiveProfile-row">
    <div class="col-xs-12 fiveProfile-col">

        <div class="row identityTitle-row">
            <div class="col-xs-12 identityTitle-col">
                Favorites
            </div>
        </div>
    </div>
    </div>
    


    <div class="row playlist-row">
        <div class="col-xs-12 playlist-col">
<!-- SONG LIST -->
<!--
** PLEASE FOLLOW FORMAT THANKS ** -->
    <div id="listContainer" class="playlistContainer">
        <ul id="playListContainer">
            <li data-src="audio/song1.m4a">
                <img src="assets/album/art1.jpg"><span>ONE OK ROCK - Always Coming Back</span>
                <p>assets/album/art1.jpg</p>
                <p2>Anonymous Iguana</p2></li>

            <li data-src="audio/song2.m4a">
                <img src="assets/album/art2.jpg"><span>SMAP - Lion Heart</span>
                <p>assets/album/art2.jpg</p>
                <p2>Anonymous Nyan Cat</p2></li>

            <li data-src="audio/song3.m4a">
                <img src="assets/album/art3.jpg"><span>Kimbra - Plain Gold Ring (Live)</span>
                <p>assets/album/art3.jpg</p>
                <p2>Anonymous Horse</p2></li>

            <li data-src="audio/song4.m4a">
                <img src="assets/album/art4.jpg"><span>Gentle Bones - Settle Down</span>
                <p>assets/album/art4.jpg</p>
                <p2>kobra? python</p2></li>

            <li data-src="audio/song5.mp3">
                <img src="assets/album/art5.jpg"><span>The Honey Trees - To Be With You</span>
                <p>assets/album/art5.jpg</p>
                <p2>mooooooooo</p2></li>
        </ul>
    </div>
<!-- End of SONG SELECTION section -->
        </div>
    </div>
</div>

<!-- SETTINGS -->
<div class="container-fluid settingsContainer">
    <div class="row settings-row">
        <div class="col-xs-12 settings-col">

            <div class="row profile-row">
                <div class="col-xs-12 profileImage-col">
                    <?php
                    include 'mPPgenerator.php';
                    ?>
                </div>
                <div class="col-xs-12 profileName-col">
                    <p><?=$owner;?></p>
                </div>
            </div>

            <div class="row options-row">
                <div class="col-xs-12 options-col">
                    <ul class="options">
                        <li><a href="mplayer.php">Home</a></li>
                        <li><a href="mfavorites.php">Favorites</a></li>
                        <li><a href="mfive.php">Constant Five</a></li>
                        <li><a href="mlogout.php">Logout</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- end of SETTINGS section -->




<script type="text/javascript">

    var clicked=true;
    $(".burgerBtn-col").on('click', function(){
        if(clicked)
        {
            clicked=false;
            $(".mainBody").css({"left": "60%"});
            $(".settingsContainer").css({"left": "0%"});
        }
        else
        {
            clicked=true;
            $(".mainBody").css({"left": "0%"});
            $(".settingsContainer").css({"left": "-60%"});
        }
    });
</script>




  </body>
</html>
    <?php
}
?>