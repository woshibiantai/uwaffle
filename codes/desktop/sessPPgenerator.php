<?php
session_start();
$owner = $_SESSION['sess_user'];
if(!isset($_SESSION['sess_user'])){
    header('location:delogin.php');
} else {
	
	include 'conn.php';

	$url = array();
	$sql = "SELECT picUrl FROM profilePic";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
	    $url[] = $row['picUrl'];
	}

	$len = count($url);
	$post = rand(0,$len-1);
	$pic = $url[$post];

	$sql2 = "UPDATE sessPic SET picUrl = '".$pic."' WHERE Username = '".$owner."'";
	if ($conn->query($sql2) === TRUE) {
		header('location:index.php');
	} else {
		echo "Error updating record: " . $conn->error;
	}
}
?>