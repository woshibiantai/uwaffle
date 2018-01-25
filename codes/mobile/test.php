<?php
include 'conn.php';

$sql = "SELECT songName FROM songsDetail";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) { ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
echo $row['songName']."<br>";
?>
</body>
</html>
<?php }
?>