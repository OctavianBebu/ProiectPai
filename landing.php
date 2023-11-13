<?php
// Include your database configuration file (config.php)
include('config.php');

// Query the database to retrieve the last registered username
$sql = "SELECT username FROM users ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastUsername = $row['username'];
} else {
    $lastUsername = "No users found";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Map</title>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

  <link rel="stylesheet" type="text/css" href="./style.css" />
  <script type="module" src="./index.js"></script>
</head>
<body>
  <h3>Hello, <?php echo $lastUsername; ?></h3>
  <!-- The div element for the map -->
  <div id="map" style="height: 400px; width: 100%;"></div>

  <script>
    // Initialize the map
    function initMap() {
      // Specify the coordinates 
      var budeasaCoords = { lat: 45.644470, lng: 25.595187};

      // Create a map 
      var map = new google.maps.Map(document.getElementById("map"), {
        center: budeasaCoords,
        zoom: 14, // Adjust the zoom level as needed
      });

      // Create a marker 
      var marker = new google.maps.Marker({
        position: budeasaCoords,
        map: map,
        title: "Budeasa, Arges",
      });
    }
  </script>

  <!-- Load the Google Maps API and call the initMap function -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBksoqQQ7yYQg8Vn8GU3MdHZZXol0qS-rM&callback=initMap"></script>
</body>
</html>