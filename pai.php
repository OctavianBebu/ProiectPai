<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "db_username", "db_password", "db_name");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['newUsername'];
    $email = $_POST['newEmail'];
    $password = $_POST['newPassword']; // Remember to hash the password
    
    // Generate a verification token
    $token = bin2hex(random_bytes(50));
    
    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, token) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $token);
    $stmt->execute();
    $stmt->close();
    
    // Send verification email
    $to = $email;
    $subject = "Email Verification";
    $message = "Hi $username, Please click the link below to verify your email address:
        file:///C:/Users/Vlad/Desktop/Proiect%20PAI%20Radu%20Vlad-Mihai/pai.html/verify.php?token=$token";
    $headers = "From: noreply@yourwebsite.com\r\n";
    mail($to, $subject, $message, $headers);
    
    echo "Verification email sent to $email";
    $conn->close();
}
?>

<!-- Your HTML form goes here -->
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



