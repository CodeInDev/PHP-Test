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
    die("Delete failed: " . $conn->connect_error);
}

$target = $_POST['target'];
$sql = "DELETE FROM posts WHERE id='$target'";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$conn->close();
?>