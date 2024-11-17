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

// Fetch the next available ID from the 'items' table
$sql = "SELECT MAX(id) AS max_id FROM items";
$result = $conn->query($sql);
$next_id = 1;  // Default if no records exist

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $next_id = $row['max_id'] + 1;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration Form</title>
    <style>
        /* Dark background and centered layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form container with dark mode styling */
        .form-container {
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            width: 350px;
            text-align: center;
        }

        .form-container h2 {
            color: #bb86fc;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            font-weight: bold;
            margin-top: 15px;
            text-align: left;
            color: #b3b3b3;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #ffffff;
        }

        .form-container input:focus {
            outline: 2px solid #bb86fc;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background-color: #bb86fc;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #9b6bdb;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Register Product</h2>
    <form action="4.php" method="POST" enctype="multipart/form-data">
        <label for="id">Next ID (Auto-generated):</label>
        <input type="text" id="id" name="id" value="<?php echo $next_id; ?>" readonly><br>

        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required step="0.01"><br>

        <label for="stock_available">Stock Available:</label>
        <input type="number" id="stock_available" name="stock_available" required><br>

        <label for="product_image">Upload Product Image:</label>
        <input type="file" id="product_image" name="product_image" accept="image/*" required><br>

        <button type="submit">Register Product</button>
    </form>
</div>

</body>
</html>
