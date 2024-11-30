<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        /* Fixed Navy Blue Background */
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            overflow: hidden; /* Hide overflow until the animation is finished */
            background: linear-gradient(to bottom, #003366, #000080); /* royal blue gradient */
            color: #f5e8c7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            position: relative;
        }

        /* Royal Blue Overlay for the Background */
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

        /* Styling for the welcome message */
        .welcome-message {
            color: #FFD700; /* Gold */
            font-size: 2rem;
            text-align: center;
            opacity: 0;
            animation: fadeInOut 7s ease forwards;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            margin-top: 20vh; /* Center the message vertically */
            z-index: 2;
        }

        /* Keyframes for fade-in and fade-out */
        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(-20px); /* Slide up on entry */
            }
            10% {
                opacity: 1;
                transform: translateY(0); /* Position in place */
            }
            70% {
                opacity: 1; /* Keep visible for a while */
            }
            100% {
                opacity: 0;
                transform: translateY(20px); /* Slide down on exit */
            }
        }

        /* Styling for the admin dashboard */
        .admin-dashboard {
            opacity: 0;
            animation: fadeIn 2s ease 7s forwards, fadeOut 2s ease 12s forwards; /* Fade-in first, fade-out after 5 seconds */
            padding: 20px;
            color: #fff;
            text-align: center;
            height: 100%;
            width: 100%;
            box-sizing: border-box;
            background: linear-gradient(to bottom, #003366, #000080); /* Ensure background is same as the page */
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.7);
            transform: translateY(20px); /* Initial position for animation */
            z-index: 2;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Fade-out effect for admin dashboard */
        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 0;
                transform: translateY(20px);
            }
        }

        /* Styling for the real admin dashboard */
        .real-admin-dashboard {
            opacity: 0;
            animation: fadeIn 2s ease 14s forwards; /* Appears after the deepfake dashboard fades */
            padding: 20px;
            color: #fff;
            text-align: center;
            height: 100%;
            width: 100%;
            box-sizing: border-box;
            background: linear-gradient(to bottom, #003366, #000080); /* Same as page */
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.7);
            transform: translateY(20px);
            z-index: 3;
        }

        /* Keyframes for fading in the real admin dashboard */
        @keyframes fadeInRealAdmin {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            color: #FFD700; /* gold */
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.5rem;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }

        .content p {
            font-size: 1.1rem;
            color: #f5e8c7;
            margin: 10px 0;
        }

        .admin-form input[type="text"],
        .admin-form input[type="password"],
        .admin-form input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .admin-form input[type="submit"] {
            background-color: #003366; /* darker royal blue */
            color: #f5e8c7;
            border: 1px solid #FFD700; /* gold */
            cursor: pointer;
        }

        .admin-form input[type="submit"]:hover {
            background-color: #000080; /* darker royal blue on hover */
        }
    </style>
</head>
<body>

    <!-- Welcome Message -->
    <div class="welcome-message">
        Welcome, dear Administrator
    </div>

    <!-- Deepfake Detection Dashboard (appears first) -->
    <div class="admin-dashboard">
        <h2>Deepfake Detection Dashboard</h2>
        <div class="content">
            <p>Deepfake detection is crucial for identifying manipulated content using cutting-edge algorithms. These technologies analyze visual and audio inconsistencies to detect alterations in media.</p>
            <p>We are continuously improving detection methods by incorporating AI and machine learning to enhance accuracy and efficiency in identifying deepfakes.</p>
            <p>This system is designed to provide administrators with powerful tools to monitor and combat media manipulation in real-time. Stay tuned for more features!</p>
        </div>
    </div>

    

</body>
</html>
