<?php
include 'conn.php';

$sql = "SELECT picUrl FROM sessPic WHERE Username = '".$owner."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "<img src='".$row['picUrl']."'>";
}

$conn->close();

?>