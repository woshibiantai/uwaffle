<?php
session_start();
$owner = $_SESSION['sess_user'];
if(!isset($_SESSION['sess_user'])){
    header('location:login.php');
} else {
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>uwaffle :: Profile</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="styles/searchBar.css">
    <link rel="stylesheet" type="text/css" href="styles/profile.css">
    <link rel="stylesheet" type="text/css" href="styles/tabs.css">
    <link rel="stylesheet" type="text/css" href="styles/playlist.css">
    <link rel="stylesheet" type="text/css" href="styles/five.css">
    <link rel="stylesheet" type="text/css" href="styles/popUp.css">
</head>
<body>

<div class="main">
<!-- SEARCH BAR -->
<!-- need to link to database to search for songs -->
    <div class="searchBar">
    <form method="POST" action="searchresult.php">
        <input type="text" name="search" placeholder="Search..">
        <input type="submit" name="Submit" value="Search" style="visibility: hidden;">
    </form>
    </div>
<!-- End of SEARCH BAR section -->

    <div class="TITLE">
        <img src="assets/profile/profile.svg">
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
        <a href="#" id="five"><img src="assets/profile/fiveBtn.svg"></a>
        <a href="favorites.php" id="favorites"><img src="assets/profile/favBtn.svg"></a>
    </div>
<!-- end of TABS sections -->
<div class="five-container">
    <div class="fiveTitle">
        <span class="yourFive"><?=$owner;?>'s Five</span><hr>
    </div>

<!-- SONG SELECTION -->
<!-- - shuffling needs to be fixed.
- the songs need to act as links/buttons 
** KAILUE PLS CHANGE THIS PART THANKS ** -->
    <div id="listContainer" class="playlistContainer">
        <ul id="playListContainer">
            <?php
            include '5generator.php';
            ?>
        </ul>
    </div>
</div>
<!-- End of SONG SELECTION section -->

<!-- POP UP -->
        <div id="popUp" class="white_content">
        <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace" placeholder="insert song name... ">
            <div class="choice">
                <div id="yes"><input type='submit' name='replaceSong' value='Replace'/></div>
                <div id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popUp').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a></div>
            </div>
        </form>
        <?php
        include 'replace.php';
        ?>
        </div>
        <a href = "javascript:void(0)" onclick = "document.getElementById('popUp').style.display='none';document.getElementById('fade').style.display='none'"><div id="fade" class="black_overlay"></div></a>

        <div id="popUp2" class="white_content">
        <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace2" placeholder="insert song name... ">
            <div class="choice">
                <div id="yes"><input type='submit' name='replaceSong2' value='Replace'/></div>
                <div id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popUp2').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a></div>
            </div>
        </form>
        <?php
        include 'replace2.php';
        ?>
        </div>
        <a href = "javascript:void(0)" onclick = "document.getElementById('popUp2').style.display='none';document.getElementById('fade').style.display='none'"><div id="fade" class="black_overlay"></div></a>

        <div id="popUp3" class="white_content">
        <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace3" placeholder="insert song name... ">
            <div class="choice">
                <div id="yes"><input type='submit' name='replaceSong3' value='Replace'/></div>
                <div id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popUp3').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a></div>
            </div>
        </form>
        <?php
        include 'replace3.php';
        ?>
        </div>
        <a href = "javascript:void(0)" onclick = "document.getElementById('popUp3').style.display='none';document.getElementById('fade').style.display='none'"><div id="fade" class="black_overlay"></div></a>

        <div id="popUp4" class="white_content">
        <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace4" placeholder="insert song name... ">
            <div class="choice">
                <div id="yes"><input type='submit' name='replaceSong4' value='Replace'/></div>
                <div id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popUp4').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a></div>
            </div>
        </form>
        <?php
        include 'replace4.php';
        ?>
        </div>
        <a href = "javascript:void(0)" onclick = "document.getElementById('popUp4').style.display='none';document.getElementById('fade').style.display='none'"><div id="fade" class="black_overlay"></div></a>

        <div id="popUp5" class="white_content">
        <form action='' method='POST'>
            Replace current song with: <br>
            <input type="text" name="replace5" placeholder="insert song name... ">
            <div class="choice">
                <div id="yes"><input type='submit' name='replaceSong5' value='Replace'/></div>
                <div id="no"><a href = "javascript:void(0)" onclick = "document.getElementById('popUp5').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a></div>
            </div>
        </form>
        <?php
        include 'replace5.php';
        ?>
        </div>
        <a href = "javascript:void(0)" onclick = "document.getElementById('popUp5').style.display='none';document.getElementById('fade').style.display='none'"><div id="fade" class="black_overlay"></div></a>
<!-- end of POP UP section -->



<!-- BACK BUTTON -->
    <div class="backButton">
        <a href="index.php">Back to uwaffle playlist</a>
    </div>
<!-- end of BACK BUTTON -->

<div class="flare"></div>

</div>
</body>
</html>
    <?php
}
?>