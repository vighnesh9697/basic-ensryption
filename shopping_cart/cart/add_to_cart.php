<?php
// Start the session to maintain cart data
session_start();

// Database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "remedy";

// Check if product ID is provided
if (!isset($_GET['id'])) {
    header("Location: ../viewitems.php"); // Redirect to viewitems.php if no product ID
    exit();
}

$product_id = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product details
$sql = "SELECT id, product_name, price FROM items WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    
    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Add product to cart or increase quantity if already exists
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        $_SESSION['cart'][$product_id] = array(
            'name' => $product['product_name'],
            'price' => $product['price'],
            'quantity' => 1
        );
    }
    
    // Set a success message
    $_SESSION['message'] = "Product added to cart successfully!";
} else {
    $_SESSION['message'] = "Product not found!";
}

// Close database connection
$stmt->close();
$conn->close();

// Redirect back to viewitems.php to display message
header("Location: ../viewitems.php");
exit();
?>
