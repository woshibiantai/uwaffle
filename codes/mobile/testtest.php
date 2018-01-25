<?php
if(isset($_POST['song']))
{
    $song = $_POST['song'];

    include 'conn.php';

	$song = $_POST('song');

	$sql = "UPDATE Favorites SET `song 5`='".$song."' WHERE Username='kailue'";
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE) {
		header('location:index.php');

	} else {
		echo 'Error';
	}


}

?>