<?php
// Database connection
$servername = "localhost";
$username = "root";  // Default for WAMP
$password = "";      // Default for WAMP
$dbname = "azazel";  // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the citizens_images table
$sql = "SELECT first_name, last_name, image_path FROM citizen_images";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Citizen Images</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .citizen {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .citizen img {
            width: 100px;
            height: auto;
            border-radius: 8px;
            margin-right: 20px;
        }
        .citizen .name {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Citizen Images</h2>

    <?php
    // Check if there are records in the database
    if ($result->num_rows > 0) {
        // Loop through and display each record
        while ($row = $result->fetch_assoc()) {
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];
            $imagePath = $row['image_path'];

            // Combine first name and last name to display as full name
            $fullName = htmlspecialchars($firstName . " " . $lastName);

            // Display the citizen's name and image
            echo "<div class='citizen'>";
            echo "<img src='" . htmlspecialchars($imagePath) . "' alt='Citizen Image'>";
            echo "<div class='name'>" . $fullName . "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No citizen images found in the database.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

</div>

</body>
</html>
