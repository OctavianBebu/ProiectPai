<?php
if (isset($_GET['token'])) {
    // Database connection
    $conn = new mysqli("localhost", "db_username", "db_password", "db_name");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $token = $_GET['token'];
    
    // Verify the token and activate the user account
    $stmt = $conn->prepare("UPDATE users SET verified = 1 WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "Email verified successfully!";
    } else {
        echo "Invalid verification token!";
    }
    
    $stmt->close();
    $conn->close();
}
?>
