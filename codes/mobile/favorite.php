<?php
include 'conn.php';

$songName = $_REQUEST['q'];

$sql = "SELECT * FROM Favorites WHERE Username = '".$owner."'";
$result = $conn->query($sql);
$favsongs = mysqli_fetch_row($result);

if(!in_array($songName, $favsongs)) {
	$count = 0;
	foreach($favsongs as $value) {
		if($value == '') {
			$sql2 = "UPDATE Favorites SET `song ".$count."`=".$songName." WHERE Username = '".$owner."'";
			if ($conn->query($sql2) === TRUE) {
				echo "assets/main/heart.svg";
				break;
			} else {
				echo "Error updating record: " . $conn->error;
			}
		} else {
			$count ++;
		}
} else {
	$count = 0;
	foreach($favsongs as $value) {
		if($value == $songName) {
			$sql3 = "UPDATE Favorites SET `song ".$count."`="" WHERE Username = '".$owner."'";
			if ($conn->query($sql3) === TRUE) {
				echo "assets/main/noheart.svg";
				break;
			} else {
				echo "Error updating record: " . $conn->error;
			}
		} else {
			$count ++;
		}
	}
}

$conn->close();

?>