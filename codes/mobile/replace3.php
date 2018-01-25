<?php
include 'conn.php';

$newsong3 = $_POST['replace3'];

$sql0 = "SELECT songName FROM songsDetail WHERE songName = '".$newsong3."'";
$result0 = $conn->query($sql0);
$numrows = mysqli_num_rows($result0);
if ($newsong3 != '') {	
	if ($numrows != 0) {
		$sql3 = "UPDATE Constants SET song3='".$newsong3."' WHERE Username = '".$owner."' ";
		if ($newsong3 != '') {
			if ($conn->query($sql3) === TRUE) {
				echo("<script>location.href = 'mfive.php';</script>");
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
	} else {
		echo "<br>".$newsong3." is unavailable";
	}
}

$conn->close();

?>