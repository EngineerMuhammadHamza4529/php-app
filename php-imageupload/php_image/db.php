<?php
// Database configuration
$host = "localhost"; // Your host name
$dbname = "db"; // Your database name
$username = "root"; // Your database username
$password = ""; // Your database password

// Establishing the connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
