<?php
include 'conn.php';

$newsong5 = $_POST['replace5'];

$sql0 = "SELECT songName FROM songsDetail WHERE songName = '".$newsong5."'";
$result0 = $conn->query($sql0);
$numrows = mysqli_num_rows($result0);
if ($newsong5 != '') {
	if ($numrows != 0) {
		$sql5 = "UPDATE Constants SET song5='".$newsong5."' WHERE Username = '".$owner."' ";
		if ($newsong5 != '') {
			if ($conn->query($sql5) === TRUE) {
				echo("<script>location.href = 'mfive.php';</script>");
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
	} else {
		echo "<br>".$newsong5." is unavailable";
	}
}

$conn->close();

?>