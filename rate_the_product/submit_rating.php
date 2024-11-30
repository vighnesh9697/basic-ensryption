<?php
header('Content-Type: text/html; charset=UTF-8'); // Ensure UTF-8 output

$servername = "localhost";
$username = "root"; // Adjust if needed
$password = ""; // Adjust if needed
$dbname = "axion";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set UTF-8 encoding for the connection
$conn->set_charset("utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = intval($_POST["rating"]);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO rating (rating) VALUES (?)");
    $stmt->bind_param("i", $rating);

    if ($stmt->execute()) {
        echo "<!DOCTYPE html>
              <html lang='en'>
              <head>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                  <title>Rating Submitted</title>
              </head>
              <body>";
        echo "Rating submitted successfully! <br>";
        echo "You rated: " . str_repeat("★", $rating) . str_repeat("☆", 5 - $rating);
        echo "</body>
              </html>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
