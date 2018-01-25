<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<h1> Search Results</h1>
<?php
include 'conn.php';

if (!isset($_POST['search'])) {
	header('location:five.php');
}

$key = $_POST['search'];
$sql = "SELECT songName FROM songsDetail WHERE songName LIKE '%".$key."%' OR artist LIKE '%".$key."%'";
$result = $conn->query($sql);
$numrows = mysqli_num_rows($result);
if ($numrows!=0) {
	while ($row = $result->fetch_assoc()) {
		?>
		<h3><?php echo $row['songName']; ?></h3><?php
	}
} else {
	echo 'No result found.';
}
?>

</body>

</html>
