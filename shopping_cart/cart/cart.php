<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

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

// Handle quantity updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = (int) $_POST['quantity'];

    // Fetch available stock from database
    $sql = "SELECT stock_available FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    // Check if quantity does not exceed available stock
    if ($item && $quantity <= $item['stock_available']) {
        // Update the session cart
        $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        $_SESSION['message'] = "Quantity updated successfully!";
    } else {
        $_SESSION['message'] = "Cannot exceed available stock!";
    }

    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            padding: 20px;
            margin: 0;
        }
        .cart-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #333;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .cart-item-details {
            display: flex;
            align-items: center;
        }
        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
        }
        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 1.2em;
            color: #bb86fc;
        }
        .message {
            background-color: #bb86fc;
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #bb86fc;
            color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin: 10px 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #9b6bdb;
        }
        .quantity {
            color: #b3b3b3;
        }
        .quantity-form {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .quantity-form input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #333;
            color: #ffffff;
        }
        .available-stock {
            font-size: 0.9em;
            color: #757575;
            margin-top: 5px;
        }
        .buttons-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <h1>Shopping Cart</h1>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <?php 
            $total = 0;
            foreach ($_SESSION['cart'] as $product_id => $item): 
                // Fetch available stock for each product
                $sql = "SELECT stock_available FROM items WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $product_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $product = $result->fetch_assoc();

                $available_stock = $product ? $product['stock_available'] : 0;
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <div class="cart-item">
                    <div class="cart-item-details">
                        <img src="uploads/<?php echo $product_id; ?>.jpeg" alt="<?php echo htmlspecialchars($item['name']); ?>" class="cart-item-image">
                        <div>
                            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                            <p class="quantity">Quantity: <?php echo $item['quantity']; ?></p>
                            <form method="post" action="cart.php" class="quantity-form">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <input type="number" name="quantity" min="1" max="<?php echo $available_stock; ?>" value="<?php echo $item['quantity']; ?>">
                                <button type="submit" class="button">Update</button>
                            </form>
                            <p class="available-stock">Available Stock: <?php echo $available_stock; ?></p>
                        </div>
                    </div>
                    <div>
                        <p>Rs <?php echo number_format($subtotal, 2); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="total">
                <p>Total: Rs <?php echo number_format($total, 2); ?></p>
            </div>
        <?php endif; ?>

        <div class="buttons-container">
            <a href="../viewitems.php" class="button">Continue Shopping</a>
            <?php if (!empty($_SESSION['cart'])): ?>
                <a href="billing.php" class="button">Proceed to Checkout</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
