<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit();
}

// Define database connection constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'info');

// Create database connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user information from database
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Delete the current profile picture from the server
if (!empty($user['profile_picture'])) {
    $path = "../uploads/" . $user['profile_picture'];
    if (file_exists($path)) {
        unlink($path);
    }
}

// Update the user profile in the database to remove the profile picture
$sql = "UPDATE users SET profile_picture='' WHERE username='$username'";
if (mysqli_query($conn, $sql)) {
    // Redirect to the edit profile page
    header("Location: edit.php");
    exit();
} else {
    echo "Error updating profile: " . mysqli_error($conn);
}
?>
