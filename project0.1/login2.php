<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Centering the form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 350px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login Form</h2>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required placeholder="Enter your username">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
        </div>

        <div class="form-group">
            <input type="submit" name="login" value="Login">
        </div>
    </form>
    
    <?php
    if (isset($_POST['login'])) {
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
        $inputUsername = $_POST['username'];
        $inputPassword = $_POST['password'];

        // Fetch encrypted password from database
        $sql = "SELECT password FROM login WHERE username = '$inputUsername'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User found, check password
            $row = $result->fetch_assoc();
            $encryptedPassword = $row['password'];

            // Decrypt the password
            $decryptedPassword = decryptIt($encryptedPassword);

            // Check if decrypted password matches user input
            if ($decryptedPassword === $inputPassword) {
                echo "<p class='message success'>Login successful!</p>";
            } else {
                echo "<p class='message error'>Incorrect password.</p>";
            }
        } else {
            echo "<p class='message error'>Username not found.</p>";
        }

        // Close connection
        $conn->close();
    }

    // Decryption function
    function decryptIt($q) {
        $cryptKey = 'rhe';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return $qDecoded;
    }
    ?>

</div>

</body>
</html>
