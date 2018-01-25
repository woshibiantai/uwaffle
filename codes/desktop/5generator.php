<?php

include 'conn.php';

$java1 = 'document.getElementById("popUp").style.display="block";document.getElementById("fade").style.display="block"';
$java2 = 'document.getElementById("popUp2").style.display="block";document.getElementById("fade").style.display="block"';
$java3 = 'document.getElementById("popUp3").style.display="block";document.getElementById("fade").style.display="block"';
$java4 = 'document.getElementById("popUp4").style.display="block";document.getElementById("fade").style.display="block"';
$java5 = 'document.getElementById("popUp5").style.display="block";document.getElementById("fade").style.display="block"';

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

echo "<li><a href = 'javascript:void(0)' onclick = '".$java1."'><div class='songTitle'>".$first."</div></a></li>";
echo "<li><a href = 'javascript:void(0)' onclick = '".$java2."'><div class='songTitle'>".$second."</div></a></li>";
echo "<li><a href = 'javascript:void(0)' onclick = '".$java3."'><div class='songTitle'>".$third."</div></a></li>";
echo "<li><a href = 'javascript:void(0)' onclick = '".$java4."'><div class='songTitle'>".$fourth."</div></a></li>";
echo "<li><a href = 'javascript:void(0)' onclick = '".$java5."'><div class='songTitle'>".$fifth."</div></a></li>";


$conn->close();
?>