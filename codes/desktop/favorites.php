<?php
session_start();
$owner = $_SESSION['sess_user'];
if(!isset($_SESSION['sess_user'])){
    header('location:delogin.php');
} else {
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>uwaffle :: Profile</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="styles/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="styles/searchBar.css">
    <link rel="stylesheet" type="text/css" href="styles/profile.css">
    <link rel="stylesheet" type="text/css" href="styles/tabs.css">
    <link rel="stylesheet" type="text/css" href="styles/playlist.css">
    <link rel="stylesheet" type="text/css" href="styles/five.css">
    <link rel="stylesheet" type="text/css" href="styles/favorites.css">
    <link rel="stylesheet" type="text/css" href="styles/popUp.css">
</head>
<body>

<div class="main">
<!-- SEARCH BAR -->
<!-- need to link to database to search for songs -->
    <div class="searchBar">
        <input type="text" name="search" placeholder="Search..">
    </div>
<!-- End of SEARCH BAR section -->

    <div class="TITLE">
        <img src="assets/profile/profile.svg" id="t1">
    </div>

<!-- IDENTITY -->
    <div class="identity">
        <?php
        include 'PPgenerator.php';
        ?>
        <span class="Name"><?=$owner;?></span>
        <p id="time"></p>
        <script type="text/javascript">
            var d = new Date()
            document.getElementById("time").innerHTML = fakeTime();
            function fakeTime() {
                return d.getHours() + ":" + d.getMinutes();}
        </script>
    </div>
<!-- end of IDENTITY -->

<!-- TABS -->
    <div class="tabs">
        <a href="five.php" id="five"><img src="assets/profile/fiveBtn.svg"></a>
        <a href="#" id="favorites"><img src="assets/profile/favBtn.svg"></a>
    </div>
<!-- end of TABS sections -->

    <div class="fiveTitle">
        <span class="yourFive">Favorites</span><hr>
    </div>

<!-- SONG SELECTION -->
<!-- - shuffling needs to be fixed.
- the songs need to act as links/buttons 
** KAILUE PLS CHANGE THIS PART THANKS ** -->
    <div id="listContainer" class="playlistContainer">
        <ul id="playListContainer">

            <li data-src="audio/song1.m4a">
                <span>ONE OK ROCK</span> - <a href="#" class="songTitle">Always Coming Back</a>
                <p>assets/album/art1.jpg</p></li>

            <li data-src="audio/song2.m4a">
                <span>SMAP</span> - <a href="#" class="songTitle">Lion Heart</a>
                <p>assets/album/art2.jpg</p></li>

            <li data-src="audio/song3.m4a">
                <span>Kimbra</span> - <a href="#" class="songTitle">Plain Gold Ring (Live)</a>
                <p>assets/album/art3.jpg</p></li>

            <li data-src="audio/song4.m4a">
                <span>Gentle Bones</span> - <a href="#" class="songTitle">Settle Down</a>
                <p>assets/album/art4.jpg</p></li>

            <li data-src="audio/song5.mp3">
                <span>The Honey Trees</span> - <a href="#" class="songTitle">To Be With You</a>
                <p>assets/album/art5.jpg</p></li>
        </ul>
    </div>
<!-- End of SONG SELECTION section -->

<!-- POP UP -->
        <div id="popUp" class="white_content">
        Are you sure you want to remove this song from your favorites?<br>
            <div class="choice">
                <div id="yes"><a href="#">YES</a></div>
                <div id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popUp').style.display='none';document.getElementById('fade').style.display='none'">NO</a></div>
            </div>
             (please edit the link for "YES" to remove the song. delete after read thanks.)
        </div>
        <a href = "javascript:void(0)" onclick = "document.getElementById('popUp').style.display='none';document.getElementById('fade').style.display='none'"><div id="fade" class="black_overlay"></div></a>
<!-- end of POP UP section -->

<!-- BACK BUTTON -->
    <div class="backButton">
        <a href="index.php">Back to uwaffle playlist</a>
    </div>
<!-- end of BACK BUTTON -->

</div>
</body>
</html>
    <?php
}
?>