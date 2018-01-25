<?php
include 'conn.php';

$newsong4 = $_POST['replace4'];

$sql0 = "SELECT songName FROM songsDetail WHERE songName = '".$newsong4."'";
$result0 = $conn->query($sql0);
$numrows = mysqli_num_rows($result0);
if ($newsong4 != '') {	
	if ($numrows != 0) {
		$sql4 = "UPDATE Constants SET song4='".$newsong4."' WHERE Username = '".$owner."' ";
		if ($newsong4 != '') {
			if ($conn->query($sql4) === TRUE) {
				echo("<script>location.href = 'mfive.php';</script>");
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
	} else {
		echo "<br>".$newsong4." is unavailable";
	}
}

$conn->close();

?>