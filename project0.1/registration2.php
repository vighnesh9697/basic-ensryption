<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
        input[type="text"], input[type="password"], input[type="file"] {
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
    <h2>Registration Form</h2>
    <form action="registration.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required placeholder="Enter your username">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
        </div>

        <div class="form-group">
            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" required>
        </div>

        <div class="form-group">
            <input type="submit" name="register" value="Register">
        </div>
    </form>
</div>

<?php

if (isset($_POST['register'])) {
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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Encrypt the password
    $encryptedPassword = encryptIt($password);

    // Insert user data into the login table
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$encryptedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='message'>Registration successful!<br>";

        // Handle file upload
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
            $target_dir = "uploads/";
            // Set the file path with the username as part of the filename to make it unique
            $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
            
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                echo "File uploaded successfully!<br>";

                // Insert file path into the user_files table
                $fileSql = "INSERT INTO user_files (username, file_path) VALUES ('$username', '$target_file')";

                if ($conn->query($fileSql) === TRUE) {
                    echo "File information saved in the database!";
                } else {
                    echo "Error saving file info: " . $conn->error;
                }
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "No file was uploaded or an error occurred.";
        }
        echo "</div>";
    } else {
        echo "<div class='message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    // Close connection
    $conn->close();
}

// Encryption function
function encryptIt($q) {
    $cryptKey = 'rhe';
    $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    return $qEncoded;
}

?>
</body>
</html>
