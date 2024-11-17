<?php
session_start();

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

// Fetch items from the database
$sql = "SELECT id, product_name, price FROM items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            justify-content: center;
            padding: 20px;
            margin: 0;
        }
        .items-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1200px;
        }
        .item {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            width: 250px;
            text-align: center;
        }
        .item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .item h3 {
            color: #bb86fc;
            font-size: 1.4em;
            margin: 10px 0;
        }
        .item p {
            color: #b3b3b3;
            font-size: 1em;
            margin: 10px 0;
        }
        .add-to-cart {
            display: inline-block;
            padding: 10px 20px;
            background-color: #bb86fc;
            color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .add-to-cart:hover {
            background-color: #9b6bdb;
        }
        .view-cart {
            display: inline-block;
            padding: 10px 20px;
            background-color: #bb86fc;
            color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            position: fixed;
            top: 20px;
            right: 20px;
        }
        .view-cart:hover {
            background-color: #9b6bdb;
        }
        /* Styling for the success message */
        .message {
            background-color: #bb86fc;
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 1;
            animation: fadeOut 2s forwards;
        }

        /* CSS animation for fading out the message */
        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
    </style>
</head>
<body>

<?php if (isset($_SESSION['message'])): ?>
    <div class="message"><?php echo $_SESSION['message']; ?></div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<div class="items-container">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='item'>";
            echo "<img src='uploads/$row[id].jpeg' alt='Product Image'>";
            echo "<h3>" . htmlspecialchars($row['product_name']) . "</h3>";
            echo "<p>Price: Rs " . number_format($row['price'], 2) . "</p>";
            echo "<a href='cart/add_to_cart.php?id=" . $row['id'] . "' class='add-to-cart'>Add to Cart</a>";
            echo "</div>";
        }
    } else {
        echo "<p>No products available.</p>";
    }
    ?>
</div>
<a href="cart/cart.php" class="view-cart">View Cart</a> <!-- Link to cart page -->

</body>
</html>

<?php
// Close the connection
$conn->close();
?>
