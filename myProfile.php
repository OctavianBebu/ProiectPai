<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect or display an error message if the user is not logged in
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        p {
            text-align: center;
        }
        .profile-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .profile-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<header>
    <h1>My Profile</h1>
</header>
<div class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Your email: <?php echo $_SESSION['email']; ?></p>

    <div style="text-align: center;padding-bottom: 10px;">
        <a href="Elemente Profil\proiect.pdf" download class="profile-button">Descarca proiect</a>
        <a href="Elemente Profil\Ion Madalin CV.pdf" download class="profile-button">Descarca CV</a>
    </div>

    <!-- Add this inside the <div class="container"> just after the other links/buttons -->
    <div style="text-align: center; padding-top: 20px;">
    <a href="logout.php" class="profile-button" style="margin-bottom: 30px;">Log Out</a>
</div>

<div style="text-align: center;">
    <a href="landing.html" class="profile-button">Inapoi la pagina principala</a>
</div>

    

</div>
</body>
</html>