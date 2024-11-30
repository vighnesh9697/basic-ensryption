<?php
// Start the session
session_start();

// Database credentials
$servername = "localhost"; // or "127.0.0.1" if localhost doesn't work
$username = "root"; // default username for WAMP server
$password = ""; // default password for WAMP server
$dbname = "deepfakedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";

// Handle form submission
if (isset($_POST['submit'])) {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepare the query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `username` = ? AND `password` = ?");
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching record is found
    if ($result->num_rows > 0) {
        // If credentials are correct, redirect to the admin homepage
        $_SESSION['username'] = $input_username; // Save session for the user
        header("Location: admin-homepage2.php"); // Redirect to the admin homepage
        exit();
    } else {
        // If credentials are incorrect, show an error message
        $error_message = "Invalid username or password.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            background: linear-gradient(to bottom, #87CEEB, #00BFFF); /* sky blue gradient */
            color: #333333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/api/placeholder/350/350'), url('/api/placeholder/350/350');
            background-repeat: no-repeat;
            background-position: left bottom, right top;
            background-size: 350px 350px;
            opacity: 0.15;
            z-index: 1;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9); /* Light white overlay */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 2px solid #4682B4; /* steel blue */
            position: relative;
            z-index: 2;
            width: 320px;
            transform: translateY(-100px);
            animation: fadeInDown 0.5s ease forwards;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-100px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            color: #4682B4; /* steel blue */
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.5rem;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #5a5a5a;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #f0f8ff; /* Alice blue */
            color: #333333;
        }

        input[type="submit"] {
            background-color: #4682B4; /* steel blue */
            color: #FFFFFF;
            border: 1px solid #5a5a5a;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #5A9BD4; /* lighter steel blue */
            transform: scale(1.05);
        }

        .error-message {
            color: #FF6347; /* tomato red */
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #4682B4; /* steel blue */
            z-index: 2;
            animation: fadeIn 0.5s ease 0.5s forwards;
        }
        
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Administrator Login</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login" name="submit">
    </form>
    <div id="message">
        <?php
        if (isset($error_message)) {
            echo '<p class="error-message">' . htmlspecialchars($error_message) . '</p>';
        }
        ?>
    </div>
</div>

</body>
</html>
