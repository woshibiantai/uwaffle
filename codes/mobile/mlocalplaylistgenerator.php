<?php
include 'conn.php';

$sql = "SELECT Username FROM Users WHERE nature = 'local'";
$result = $conn->query($sql);    
$all = array();

while($row = $result->fetch_assoc()) {
    $all[] = $row['Username'];
}

shuffle($all);
$songs = array();
$source = array();
foreach ($all as $names) {
    $sql2 = "SELECT song1, song2, song3, song4, song5 FROM Constants WHERE Username = '".$names."'";
    $result2 = $conn->query($sql2);
    while($row2 = $result2->fetch_assoc()) {
        if ($row2['song1'] != '' and !in_array($row2['song1'], $songs)) {
            $songs[] = $row2['song1'];
            $source[] = $names;
        }
        if ($row2['song2'] != '' and !in_array($row2['song2'], $songs)) {
            $songs[] = $row2['song2'];
            $source[] = $names;
        }
        if ($row2['song3'] != '' and !in_array($row2['song3'], $songs)) {
            $songs[] = $row2['song3'];
            $source[] = $names;
        }
        if ($row2['song4'] != '' and !in_array($row2['song4'], $songs)) {
            $songs[] = $row2['song4'];
            $source[] = $names;
        }
        if ($row2['song5'] != '' and !in_array($row2['song5'], $songs)) {
            $songs[] = $row2['song5'];
            $source[] = $names;
        }
    }
}

$count = 0;
$dict = array();
$nest = array();
foreach ($songs as $value) {
    $nest[] = $value;
    $nest[] = $source[$count];
    $count ++;
    $dict[] = $nest;
    $nest = array();
}

foreach ($dict as $output) {
    $sql3 = "SELECT url, artist, art FROM songsDetail WHERE songName = '".$output[0]."'";
    $result3 = $conn->query($sql3);
    while($row3 = $result3->fetch_assoc()) {
        echo "<li data-src='".$row3['url']."'>
                <img src='".$row3['art']."'><span>".$row3['artist']."</span> - <a href='#' class='songTitle'>".$output[0]."</a>
                <p>".$row3['art']."</p><p2>".$output[1]."</p2></li>";
    }
}

$conn->close();
?>