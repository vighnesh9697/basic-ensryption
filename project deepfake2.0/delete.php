<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$con = mysqli_connect("localhost", "root", "", "deepfakedb");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// SQL query to delete the user
$sql = "DELETE FROM login WHERE id = '$user_id'";

if (mysqli_query($con, $sql)) {
    // Destroy session and redirect to login page after deletion
    session_destroy();
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
