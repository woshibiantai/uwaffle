<?php
include 'conn.php';

$newsong = $_POST['replace'];

$sql0 = "SELECT songName FROM songsDetail WHERE songName = '".$newsong."'";
$result0 = $conn->query($sql0);
$numrows = mysqli_num_rows($result0);
if ($newsong != '') {	
	if ($numrows != 0) {
		$sql = "UPDATE Constants SET song1='".$newsong."' WHERE Username = '".$owner."' ";
		if ($newsong != '') {
			if ($conn->query($sql) === TRUE) {
				echo("<script>location.href = 'five.php';</script>");
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
	} else {
		echo "<br>".$newsong." is unavailable";
	}
}



$conn->close();

?>