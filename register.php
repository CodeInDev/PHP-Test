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
    die("Registration failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$check = "SELECT * FROM accounts WHERE username='$username'";
$result = $conn->query($check);
$sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";

if ($result->num_rows == 0) {
    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
} else {
    echo "Username has already been taken";
}

$conn->close();
?>