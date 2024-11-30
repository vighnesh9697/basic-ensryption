<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* General Reset and Body Styling */
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            overflow: hidden;
            background: linear-gradient(to bottom, #003366, #000080); /* Navy Blue Gradient */
            color: #f5e8c7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        /* Welcome Message */
        .welcome-message {
            color: #FFD700; /* Gold */
            font-size: 2rem;
            text-align: center;
            opacity: 0;
            animation: fadeInOut 7s ease forwards;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            position: absolute;
            z-index: 2;
        }

        @keyframes fadeInOut {
            0% { opacity: 0; transform: translateY(-20px); }
            10% { opacity: 1; transform: translateY(0); }
            70% { opacity: 1; }
            100% { opacity: 0; transform: translateY(20px); }
        }

        /* Deepfake Detection Dashboard */
        .admin-dashboard {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 80%;
            width: 80%;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            opacity: 0;
            animation: fadeIn 2s ease 7s forwards, fadeOut 2s ease 12s forwards;
            color: #f5e8c7;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeOut {
            0% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(20px); }
        }

        /* Real Admin Dashboard */
        .real-admin-dashboard {
            display: flex;
            flex-direction: row;
            height: 100vh;
            width: 100vw;
            background: #1a2634;
            color: #f5f5f5;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            animation: fadeInRealAdmin 2s ease 14s forwards;
        }

        @keyframes fadeInRealAdmin {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #1a2634;
            padding: 20px;
            border-right: 1px solid #2d3846;
            display: flex;
            flex-direction: column;
        }

        .user-profile {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .user-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info h3 {
            margin: 0;
            font-size: 1.1rem;
        }

        .online-status {
            color: #4CAF50;
            font-size: 0.8rem;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
        }

        .nav-menu li {
            margin: 10px 0;
        }

        .nav-menu li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-menu li:hover {
            background-color: #2d3846;
            border-radius: 5px;
            padding: 5px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background: #f8f9fa;
            color: #333;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-card i {
            font-size: 2rem;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Welcome Message -->
    <div class="welcome-message">Welcome, dear Administrator</div>

    <!-- Deepfake Detection Dashboard -->
    <div class="admin-dashboard">
        <h1>Deepfake Detection</h1>
        <p>Deepfake detection is crucial for identifying manipulated content using cutting-edge algorithms. 
        In recent years, the rise of deepfake technology has posed significant challenges to digital security and trustworthiness.</p>
        <p>Our system leverages advanced machine learning models and real-time analysis to distinguish between authentic and fabricated media.</p>
        <p>With continuous updates to our algorithms, we strive to stay ahead of evolving techniques used by malicious actors to create convincing deepfakes.</p>
        <p>By detecting and addressing these manipulations, we aim to safeguard online interactions, uphold the integrity of digital content, and prevent misinformation campaigns.</p>
        <p>Together, we can create a safer digital environment by promoting transparency and ensuring accountability.</p>
    </div>

    <!-- Real Admin Dashboard -->
    <div class="real-admin-dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-profile">
            <img src="uploads/sharingan-modified.jpg" alt="Profile">
                <div class="user-info">
                    <h3>Jack Frost</h3>
                    <span class="online-status">● Online</span>
                </div>
            </div>
            <ul class="nav-menu">
                <li><a href="#"><i class="fas fa-chart-pie"></i><h3> Menu</h3></a></li>
                <li><a href="#"><i class="fas fa-users"></i> User Management</a></li>
                <li><a href="#"><i class="fas fa-eye"></i> Content Oversight</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Platform Configuration</a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i> Analytics and Reporting</a></li>
                <li><a href="#"><i class="fas fa-book"></i> Educational Content Management</a></li>
                <li><a href="#"><i class="fas fa-comments"></i> Community Management</a></li>
                <li><a href="#"><i class="fas fa-puzzle-piece"></i> Feature Integration</a></li>
                <li><a href="#"><i class="fas fa-exclamation-triangle"></i> Incident Escalation</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h2></h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <i class="fas fa-pic"></i>
                    <div class="stat-number">1,200</div>
                    <div class="stat-label">Users</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-pic"></i>
                    <div class="stat-number">500</div>
                    <div class="stat-label">Photos Detected</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
