<?php
session_start(); // Start the session

// Include your database configuration file (config.php)
include('config.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user login data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to retrieve user data
    $stmt = $conn->prepare("SELECT username, email, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($storedUsername,$email, $hashedPassword);
        $stmt->fetch();

        // Verify the entered password against the hashed password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, set up a session
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            // Redirect to a welcome or dashboard page upon successful login
            header("Location: myProfile.php");
            exit; // Make sure to exit to stop script execution
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "Invalid username. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>
