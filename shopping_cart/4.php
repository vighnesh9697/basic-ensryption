<?php
// Database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "remedy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted and the file was uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['product_image'])) {
    // Retrieve form data
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock_available = $_POST['stock_available'];

    // Directory where the file will be saved
    $target_dir = "uploads/";
    // Set the target file path and name the file as the item ID with original extension
    $file_extension = pathinfo($_FILES["product_image"]["name"], PATHINFO_EXTENSION);
    $target_file = $target_dir . $id . '.' . $file_extension;

    // Create uploads directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Attempt to upload the file
    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        // File uploaded successfully, insert record into the database
        $sql = "INSERT INTO items (id, product_name, price, stock_available) 
                VALUES ('$id', '$product_name', '$price', '$stock_available')";

        if ($conn->query($sql) === TRUE) {
            echo "Product registered successfully with image.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading the image.";
    }
} else {
    echo "No file uploaded or form not submitted correctly.";
}

// Close the connection
$conn->close();
?>
