<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deepfake Detection Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        /* Base styles */
        body {
            font-family: 'Orbitron', sans-serif;
            background: linear-gradient(to bottom, #2e003e, #4b0082);
            color: #f5e8c7;
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
            opacity: 0.3;
            z-index: 1;
        }

        .registration-container {
            background: rgba(30, 0, 50, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.7);
            text-align: center;
            border: 2px solid #ffd700;
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
            color: #FFD700;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.5rem;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }

        input[type="text"], input[type="phone"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #333;
            color: #ffffff;
        }

        input[type="submit"] {
            background-color: #6a0dad;
            color: #f5e8c7;
            border: 1px solid #ffd700;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #4b0082;
            transform: scale(1.05);
        }

        .error-message, .success-message {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .error-message {
            color: red;
        }

        .success-message {
            color: green;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #c0c0c0;
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

<div class="registration-container">
    <h2>User Register</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="phone" name="phone" placeholder="Phone Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <input type="submit" value="Register" name="submit">
    </form>
    <div id="message">
        <?php
        if (isset($_POST['submit'])) {
            $con = mysqli_connect("localhost", "root", "", "deepfakedb");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $username = mysqli_real_escape_string($con, $_POST['username']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

            if ($password !== $confirm_password) {
                echo '<p class="error-message">Passwords do not match.</p>';
            } else {
                $sql = "INSERT INTO login (username, phone, password) VALUES ('$username', '$phone', '$password')";

                if (mysqli_query($con, $sql)) {
                    echo '<p class="success-message">Registration successful!</p>';
                } else {
                    echo '<p class="error-message">Error: ' . mysqli_error($con) . '</p>';
                }
            }

            mysqli_close($con);
        }
        ?>
    </div>
</div>

</body>
</html>
