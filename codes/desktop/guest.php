<?php
session_start();
$guest = array('Guest1', 'Guest2', 'Guest3', 'Guest4', 'Guest5');
$num = rand(1,5);
$_SESSION['sess_user'] = $guest[$num];
header('Location: index.php');
?>