<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "kontrak";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>