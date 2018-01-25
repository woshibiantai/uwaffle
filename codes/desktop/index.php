<?php
session_start();
if(!isset($_SESSION['sess_user'])) { ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>uwaffle!</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="styles/stylesheet.css">
        <link rel="stylesheet" type="text/css" href="styles/playerSkin.css">
        <link rel="stylesheet" type="text/css" href="styles/playlist.css">
        <link rel="stylesheet" type="text/css" href="styles/searchBar.css">
        <link rel="stylesheet" type="text/css" href="styles/homeButton.css">

        <script type="text/javascript" src="script/jquery-3.0.0.min.js"></script>
    </head>


    <body>

    <div class="main">
    <!-- SEARCH BAR -->
    <!-- ** need to link to database to search for songs ** -->
        <div class="searchBar">
            <input type="text" name="search" placeholder="Search..">
        </div>
    <!-- End of SEARCH BAR section -->


        <div class="TITLE">
            <img src="assets/title1.svg" id="t1"><br>
            <img src="assets/title2.svg" id="t2">
        </div>


    <!-- MUSIC PLAYER  -->
        <div id="playerContainer">
        <div id="controlContainer">  
            <h1><img src="assets/nowplaying.svg"></h1>
            <hr>

            <span class="albumArt">
                <img id="art" src="assets/albumart.jpg">
            </span>

            <div class="progress">
                <div data-attr="seekableTrack" class="seekableTrack"></div>
                <div class="updateProgress"></div>
            </div>

             <div class="audioDetails">
                <span class="songPlay"></span> <br>
                <span class="songArtist"></span> <br>
                <span class="songSource"></span>
            </div>


            <ul class="controls">
                <li>
                    <a href="#" class="play" data-attr="playPauseAudio"></a>
                </li>
                <li>
                    <a href="#" class="right" data-attr="nextAudio"></a>
                </li>
            </ul>
                
            </div>
        </div>
    <!-- End of MUSIC PLAYER section --> 

        <!-- TABS -->
    <div class="player-tabs">
        <a href="indexlocal.php" id="local-tab"><img src="assets/local.svg"></a>
        <a href="indexnonlocal.php" id="nonlocal-tab"><img src="assets/foreign.svg"></a>
        <a href="index.php" id="player-tab"><img src="assets/all.svg"></a>
    </div>
<!-- end of TABS sections -->


    <!-- SONG SELECTION -->
    <!-- - shuffling needs to be fixed.
    - the songs need to act as links/buttons 
    ** KAILUE PLS CHANGE THIS PART THANKS ** -->
        <div id="listContainer" class="playlistContainer">
            <ul id="playListContainer">
                <?php
                include 'playlistgenerator.php';
                ?>
            </ul>
        </div>
    <!-- End of SONG SELECTION section -->

    <div class="playlistBG"></div>

    <!-- HOME BUTTON -->
        <div id="homeBtn"></div>
        <div id="home">
            <a href="delogin.php" id="profile"><img src="assets/loginBtn.svg"></a>
            <a href="signup.php" id="logout"><img src="assets/signupBtn.svg"></a>
        </div>
    <!-- end of HOME BUTTON -->

    </div>




<!-- JAVASCRIPT for music player -->
        <script src="script/audioControls/jquery.audioControls.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#playListContainer").audioControls({
                    autoPlay : false,
                    shuffled: false,
                    timer: 'increment',
                    onAudioChange : function(response){
                        $('.songPlay').text(response.title);
                        $('.songArtist').text(response.artist);
                        $('.songSource').text(response.source);
                        document.getElementById("art").src = response.art;
                    },
                });
            });       
        </script>

        <!-- home button pop-up -->
        <script type="text/javascript">
            $(document).mouseup(function (e){
                var container = $("#homeBtn");
                var popup = $("#home");

                if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    // popup.hide();
                    popup.fadeOut(100);
                }

                if (container.is(e.target)){
                    // popup.show()
                    popup.fadeIn(100);
                }
            });
        </script>
    </body>
    </html>
    <?php
} else {
    header('location:player.php');
}
?>