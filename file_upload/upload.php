<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "axion";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileName = $_FILES['file']['name'];
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $uploadDir = 'uploads/';
        
        // Create the uploads directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadFilePath = $uploadDir . basename($fileName);

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {
            // Save file information to the database
            $sql = "INSERT INTO uploaded_files (file_name, file_path, file_size, file_type) 
                    VALUES ('$fileName', '$uploadFilePath', '$fileSize', '$fileType')";

            if ($conn->query($sql) === TRUE) {
                echo "File uploaded and saved successfully!";
            } else {
                echo "Error saving file info to database: " . $conn->error;
            }
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "No file uploaded or an error occurred.";
    }
}

// Close the database connection
$conn->close();
?>
