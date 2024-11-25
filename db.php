<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db";

// Connection create karein
$conn = new mysqli($host, $username, $password, $database);

// Connection check karein
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database Connected Successfully!";
}
?>