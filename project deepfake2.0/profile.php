<?php
session_start(); // Continue the session

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$con = mysqli_connect("localhost", "root", "", "deepfakedb");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user email from session
$email = $_SESSION['email'];

// Prepare and execute query to get user details
$sql = "SELECT * FROM login WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch user data
$user_data = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Deepfake Detection</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Orbitron, sans-serif;
            background: linear-gradient(to bottom, #2e003e, #4b0082);
            color: #f5e8c7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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
            background-image: url('shadow-dragon1.png'), url('shadow-dragon2.png');
            background-repeat: no-repeat;
            background-position: left top, right bottom;
            background-size: 300px 300px, 350px 350px;
            opacity: 0.1;
            z-index: 1;
        }

        .profile-container {
            background: rgba(30, 0, 50, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            width: 400px;
            border: 2px solid #ffd700;
            position: relative;
            z-index: 2;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #FFD700;
            margin-bottom: 30px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .info-label {
            color: #ffd700;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .info-value {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            color: #fff;
        }

        .logout-btn {
            background-color: #6a0dad;
            color: #f5e8c7;
            border: 1px solid #ffd700;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
            display: block;
            width: 100%;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #4b0082;
            transform: scale(1.05);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #bbb;
            z-index: 2;
        }

        .edit-btn {
            background-color: #4a0082;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2>User Profile</h2>
    
    <div class="profile-info">
        <?php
        // Display all fields from the login table
        foreach ($user_data as $field => $value) {
            // Skip displaying password
            if ($field != 'password') {
                echo "<div class='info-label'>" . ucfirst($field) . "</div>";
                echo "<div class='info-value'>" . htmlspecialchars($value) . "</div>";
            }
        }
        ?>
    </div>

    <a href="edit_profile.php" class="logout-btn edit-btn">Edit Profile</a>
    <a href="logout.php" class="logout-btn">Logout</a>

    <div class="footer">
        <p>&copy; 2024 Deepfake Detection Inc.</p>
    </div>
</div>

</body>
</html>