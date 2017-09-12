<?php
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Load failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $array = array();
    while($row = $result->fetch_assoc()) {
        $array[] = json_encode($row);
    }
	echo json_encode($array);
} else {
    echo json_encode([]);
}
$conn->close();
?>