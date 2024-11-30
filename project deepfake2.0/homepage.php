<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deepfake Detection Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
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

        .container {
            background: rgba(30, 0, 50, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.7);
            text-align: center;
            border: 2px solid #ffd700;
            position: relative;
            z-index: 2;
            opacity: 0;
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
            margin-bottom: 20px;
            font-family: 'Orbitron', sans-serif;
            color: #FFD700;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }

        .button {
            background-color: #6a0dad;
            color: #f5e8c7;
            border: 1px solid #ffd700;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px 0;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
        }

        .button:hover {
            background-color: #4b0082;
            transform: scale(1.05);
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #c0c0c0;
            z-index: 2;
            opacity: 0;
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
<div class="container">
    <h2>Deepfake Detection</h2>
    <a href="login.php" class="button">Login</a>
    <a href="registration.php" class="button">Register</a>
</div>
<div class="footer">
    <p>&copy; 2024 Deepfake Detection Inc.</p>
</div>
</body>
</html>