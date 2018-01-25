<?php

include 'conn.php';

$sql = "SELECT song1, song2, song3, song4, song5 FROM Constants WHERE Username = '".$owner."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    if ($row['song1'] == '') {
    	$first = '<  tap to change  >';
    } else {
    	$first = $row['song1'];	
    }
    if ($row['song2'] == '') {
    	$second = '<  tap to change  >';
    } else {
    	$second = $row['song2'];	
    }
    if ($row['song3'] == '') {
    	$third = '<  tap to change  >';
    } else {
    	$third = $row['song3'];	
    }
    if ($row['song4'] == '') {
    	$fourth = '<  tap to change  >';
    } else {
    	$fourth = $row['song4'];	
    }
    if ($row['song5'] == '') {
    	$fifth = '<  tap to change  >';
    } else {
    	$fifth = $row['song5'];	
    }
}

$allSongs = array($first, $second, $third, $fourth, $fifth);
$java1 = 'document.getElementById("popup1").style.bottom=0';
$java2 = 'document.getElementById("popup2").style.bottom=0';
$java3 = 'document.getElementById("popup3").style.bottom=0';
$java4 = 'document.getElementById("popup4").style.bottom=0';
$java5 = 'document.getElementById("popup5").style.bottom=0';
$java = array($java1, $java2, $java3, $java4, $java5);
$count = 0;
foreach ($allSongs as $value) {
	if ($value == '<  tap to change  >') {
		echo "<li style='text-align: center;'><a href='javascript:void(0)' onclick='".$java[$count]."'><span class='songTitle'>".$value."</span></a></li>";
        $count ++;
	} else {
		$sql2 = "SELECT url, artist, art FROM songsDetail WHERE songName = '".$value."'";
		$result2 = $conn->query($sql2);
		while($row2 = $result2->fetch_assoc()) {
            echo "<li><a href='javascript:void(0)' onclick='".$java[$count]."'>
                        <img src='".$row2['art']."'><span>".$row2['artist']."</span> - <span class='songTitle'>".$value."</span>
                    </a></li>";
            $count ++;
		}
	}
}

$conn->close();
?>

