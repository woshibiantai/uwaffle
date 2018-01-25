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
    <title>uwaffle! :: five</title>

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
                Constant Five
            </div>
        </div>
    </div>
    </div>

<!-- SONG LIST -->
<!--** PLEASE FOLLOW FORMAT THANKS ** -->
    <div class="row playlist-row">
        <div class="col-xs-12 playlist-col">
            <div id="listContainer" class="playlistContainer">
                <ul id="playListContainer">
                    <?php
                    include 'm5generator.php';
                    ?>
                </ul>
            </div>
        </div>
    </div>
<!-- End of SONG SELECTION section -->

<!-- POP UP -->
    <div class="row popup-row" id="popup1">
        <div class="col-xs-12 popup-col">
            <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace" placeholder="insert song name... ">
            <div class="choice">
                <span id="yes"><input type='submit' name='replaceSong1' value='Replace'></span>
                <span id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popup1').style.bottom='-50%'">Cancel</a></span>
            </div>
        </form>
        <?php
        include 'replace.php';
        ?>
        </div>
    </div>
    <div class="row popup-row" id="popup2">
        <div class="col-xs-12 popup-col">
            <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace2" placeholder="insert song name... ">
            <div class="choice">
                <span id="yes"><input type='submit' name='replaceSong2' value='Replace'></span>
                <span id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popup2').style.bottom='-50%'">Cancel</a></span>
            </div>
        </form>
        <?php
        include 'replace2.php';
        ?>
        </div>
    </div>
    <div class="row popup-row" id="popup3">
        <div class="col-xs-12 popup-col">
            <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace3" placeholder="insert song name... ">
            <div class="choice">
                <span id="yes"><input type='submit' name='replaceSong3' value='Replace'></span>
                <span id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popup3').style.bottom='-50%'">Cancel</a></span>
            </div>
        </form>
        <?php
        include 'replace3.php';
        ?>
        </div>
    </div>
    <div class="row popup-row" id="popup4">
        <div class="col-xs-12 popup-col">
            <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace4" placeholder="insert song name... ">
            <div class="choice">
                <span id="yes"><input type='submit' name='replaceSong4' value='Replace'></span>
                <span id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popup4').style.bottom='-50%'">Cancel</a></span>
            </div>
        </form>
        <?php
        include 'replace4.php';
        ?>
        </div>
    </div>
    <div class="row popup-row" id="popup5">
        <div class="col-xs-12 popup-col">
            <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace5" placeholder="insert song name... ">
            <div class="choice">
                <span id="yes"><input type='submit' name='replaceSong5' value='Replace'></span>
                <span id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popup5').style.bottom='-50%'">Cancel</a></span>
            </div>
        </form>
        <?php
        include 'replace5.php';
        ?>
        </div>
    </div>
<!-- End of POP UP section -->

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