<?php
session_start();
if(!isset($_SESSION['sess_user'])){ ?>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>uwaffle!</title>

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
        <link rel="stylesheet" type="text/css" href="css/settings.css">

      </head>
      <body>
    <div class="body">

    <div class="container-fluid mainBody">

        <div class="row header-row">
            <div class="col-xs-2 burgerBtn-col"></div>
            <div class="col-xs-10 header-col dropdown">
            </div>
        </div>
                <div id="local-dropdown" class="dropdown-content">
                    <ul>
                        <li><a href="index.php">show all</a></li>
                        <li><a href="mindexlocal.php">local</a></li>
                        <li><a href="mindexnonlocal.php">non-local</a></li>
                    </ul>
                </div>

        <div class="row playlist-row">
            <div class="col-xs-12 playlist-col">
    <!-- SONG SELECTION -->
        <div id="listContainer" class="playlistContainer">
            <ul id="playListContainer">
                <?php
                include 'mlocalplaylistgenerator.php';
                ?>
            </ul>
        </div>
    <!-- End of SONG SELECTION section -->
            </div>
        </div>

    <!-- MINI PLAYER -->
        <div class="row playerMin-row">
            <div class="col-xs-12 controls-col">
            <!-- MUSIC PLAYER  -->
            <div id="playerContainer">
            <div id="controlContainer">

                <div class="row pullTab-row"><div class="col-xs-12 pullTab-col"></div></div>

                <div class="row controls-row">
                
                    <div class="col-xs-2 play-col">
                        <ul class="controls"><a href="#" class="play" data-attr="playPauseAudio"></a></ul>
                    </div>

                    <div class="col-xs-8 details-col">
                        <p>Now Playing</p>
                        <p class="songDetails"><span class="songArtist"></span> - 
                <span class="songPlay"></span></p>
                    </div>
                        
                    <div class="col-xs-2 skip-col">
                        <ul class="controls"><a href="#" class="right" data-attr="nextAudio"></a></ul></div>

                </div>
            </div>
            </div>
            <!-- End of MUSIC PLAYER section --> 
            </div>
        </div>
    <!-- end of MINI PLAYER -->



    <!-- LARGE PLAYER -->
    <div class="row playerMax-row">
        <div class="col-xs-12 playerMax-col">
            <div class="row pushTab-row"><div class="col-xs-12 pushTab-col"></div></div>

            <div class="row detailsMax-row">
                <div class="col-xs-12 detailsMax-col">
                    <p>Now Playing</p><hr>
                    <img id="art" src="assets/main/albumArt.png">

                    <div class="audioDetailsMax">
                        <span class="songArtist"></span> - 
                        <span class="songPlay"></span>
                    </div>

                    <div class="progress">
                        <div data-attr="seekableTrack" class="seekableTrack"></div>
                        <div class="updateProgress"></div>
                    </div>

                    <div class="row controlsMax-row">
                        <div class="col-xs-2 col-xs-offset-3 playMax-col">
                            <ul class="controlsMax"><a href="#" class="favoriteBtn"></a><a href="#" class="play" data-attr="playPauseAudio"></a><a href="#" class="right" data-attr="nextAudio"></a>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row uwaffleScan-row">
                <div class="col-xs-12 uwaffleScan-col">
                    <div class="row lastScan-row">
                        <div class="col-xs-12 lastScan-col">
                            Last uwaffle scan
                        </div>
                    </div>

                    <div class="row lastScanTime-row">
                        <div class="col-xs-12 lastScanTime-col">
                            <span id="scanTime"></span>
                        </div>
                    </div>

                    <div class="row lastUser-row">
                        <div class="col-xs-12 lastUser-col">
                            <span class="lastUser"></span>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end of LARGE PLAYER -->
    </div>

    <!-- SETTINGS -->
    <div class="container-fluid settingsContainer">
        <div class="row settings-row">
            <div class="col-xs-12 settings-col">

                <div class="row profile-row">
                    <div class="col-xs-12 profileImage-col">
                        <img src="assets/main/logo.svg">
                    </div>
                    <div class="col-xs-12 profileName-col">
                        <p>Please log in to view more!</p>
                    </div>
                </div>

                <div class="row options-row">
                    <div class="col-xs-12 options-col">
                        <ul class="options">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="mlogin.php">Log In</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end of SETTINGS section -->
    </div>


        <!-- JAVASCRIPT for music player -->
        <script src="js/audioControls/jquery.audioControls.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#playListContainer").audioControls({
                    autoPlay : false,
                    shuffled: false,
                    timer: 'increment',
                    onAudioChange : function(response){
                        $('.songArtist').text(response.artist);
                        $('.songPlay').text(response.title);
                        $('.lastUser').text(response.lastUser);
                        document.getElementById("art").src = response.art;
                    },
                });
            });       
        </script>

    <script type="text/javascript">
        $(".dropdown").on('click', function(){
            document.getElementById("local-dropdown").classList.toggle("dropdown-content-show");
        });

        $(".details-col").on('click', function(){
            $(".playerMin-row").css({"bottom": "87%"});
            $(".playerMax-row").css({"bottom": "0%"});
            $(".playerMin-row").css({"opacity":"0"});
            $(".playlist-row").css({"opacity":"0"});
        });
        $(".pushTab-row").on('click', function(){
            $(".playerMin-row").css({"bottom": "0"});
            $(".playerMax-row").css({"bottom": "-87%"});
            $(".playerMin-row").css({"opacity":"1"});
            $(".playlist-row").css({"opacity":"1"});
        });

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

    <script type="text/javascript">
        var d = new Date()
        document.getElementById("scanTime").innerHTML = fakeTime();
        function fakeTime() {
            return d.getHours() + ":" + d.getMinutes();}
    </script>



      </body>
    </html>
    <?php
} else {
    header('location:mplayerlocal.php');
}
?>