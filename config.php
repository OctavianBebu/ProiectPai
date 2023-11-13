<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'proiect';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// SQL to create table
$sql = '
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
)
';

// Execute query
if ($conn->query($sql) === TRUE) {
} else {
    echo 'Error creating table: ' . $conn->error;
}

// Close connection
//$conn->close();
?>
