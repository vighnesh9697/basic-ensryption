<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            padding: 20px;
            margin: 0;
        }
        .billing-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            background-color: #2a2a2a;
            border: none;
            border-radius: 5px;
            color: #ffffff;
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
    </style>
</head>
<body>
    <div class="billing-container">
        <h1>Billing</h1>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <form action="process_payment.php" method="post">
            <div class="form-group">
                <label for="name">Name on Card</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" name="card-number" required>
            </div>
            <div class="form-group">
                <label for="expiration">Expiration Date</label>
                <input type="text" id="expiration" name="expiration" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required>
            </div>

            <?php 
            $total = 0;
            foreach ($_SESSION['cart'] as $product_id => $item): 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            endforeach;
            ?>

            <div class="total">
                <p>Total: Rs <?php echo number_format($total, 2); ?></p>
            </div>

            <div class="buttons-container">
                <a href="cart.php" class="button">Back to Cart</a>
                <button type="submit" class="button">Place Order</button>
            </div>
        </form>
    </div>
</body>
</html>