<?php
// Include your database configuration file (config.php)
include('config.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user registration data from the form
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    $newPassword = $_POST['newPassword'];

    // Add validation for the input data here (e.g., check for valid email format)

    // Hash the user's password for security
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Insert the user data into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $newUsername, $newEmail, $hashedPassword);

    if ($stmt->execute()) {
        // Registration was successful, you can redirect the user to a login page
        header("Location: login.html"); // Replace with the actual login page URL
    } else {
        // Registration failed, display an error message
        echo "Registration failed. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>