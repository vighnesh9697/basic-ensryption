<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen Image Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 20px;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Citizen Image Form</h2>
    <form action="citizen_image.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name">
        </div>

        <div class="form-group">
            <label for="citizen_image">Upload Image:</label>
            <input type="file" id="citizen_image" name="citizen_image" required>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>

<?php

if (isset($_POST['submit'])) {
    // Database connection
    $servername = "localhost";
    $username = "root"; // default for WAMP
    $password = ""; // default for WAMP
    $dbname = "azazel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    // Handle image upload
    if (isset($_FILES['citizen_image']) && $_FILES['citizen_image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["citizen_image"]["name"]);
        
        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES["citizen_image"]["tmp_name"], $target_file)) {
            echo "<div class='message'>Image uploaded successfully!<br>";

            // Insert the form data and image path into the database
            $sql = "INSERT INTO citizen_images (first_name, last_name, image_path) 
                    VALUES ('$firstName', '$lastName', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "Data stored successfully!";
            } else {
                echo "Error storing data: " . $conn->error;
            }
        } else {
            echo "Error uploading the image.";
        }
    } else {
        echo "No image was uploaded or an error occurred.";
    }

    // Close connection
    $conn->close();
}

?>

</body>
</html>
