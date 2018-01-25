<?php
include 'conn.php';

$newsong2 = $_POST['replace2'];

$sql0 = "SELECT songName FROM songsDetail WHERE songName = '".$newsong2."'";
$result0 = $conn->query($sql0);
$numrows = mysqli_num_rows($result0);
if ($newsong2 != '') {	
	if ($numrows != 0) {
		$sql2 = "UPDATE Constants SET song2='".$newsong2."' WHERE Username = '".$owner."' ";
		if ($newsong2 != '') {
			if ($conn->query($sql2) === TRUE) {
				echo("<script>location.href = 'five.php';</script>");
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
	} else {
		echo "<br>".$newsong2." is unavailable";
	}
}

$conn->close();

?>