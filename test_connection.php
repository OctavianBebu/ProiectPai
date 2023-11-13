<?php
// Include your database configuration file
require 'config.php';

// Create a MySQLi connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to the MySQL database.";

// Close the connection (optional)
$conn->close();
?>