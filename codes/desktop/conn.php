<?php

$servername = "209.99.16.19:3306";
$username = "kailue";
$password = "...95o4231o554I...";
$dbname = "uwaffle";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?> 